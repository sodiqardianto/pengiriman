<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read-laporan|create-laporan|update-laporan|delete-laporan', ['only' => ['report', 'reportMingguan', 'reportBulanan']]);
        $this->middleware('permission:create-laporan', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-laporan', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-laporan', ['only' => ['destroy']]);
    }

    public function report()
    {
        $transaction = Transaction::all();
        return view('report.index', compact('transaction'));
    }

    public function reportMingguan()
    {
        $transaction = Transaction::all();
        return view('report.range', compact('transaction'));
    }

    public function reportBulanan()
    {
        $transaction = Transaction::all();
        return view('report.month', compact('transaction'));
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters([
                'buttons' => ['pdf'],
            ]);
    }

    public function dataReport(Request $request)
    {
        $transaction = Transaction::all();
        $muatan = 0;
        $biaya = 0;
        $surat = 0;
        foreach ($transaction as $item) {
            foreach ($item->details as $details) {
                $muatan += $details->muatan;
                if ($details->muatan == 25) {
                    $biaya += $item->city->zona->harga25;
                } else if ($details->muatan == 50) {
                    $biaya += $item->city->zona->harga50;
                } else {
                    $biaya += $item->city->zona->harga100;
                }
                $surat++;
            }
        }

        if (request()->ajax()) {

            if (!empty($request->from_date)) {
                if ($request->tipe == "range") {
                    $data = Transaction::whereDate('created_at', '>=', $request->from_date)
                        ->whereDate('created_at', '<=', $request->to_date)
                        ->get();
                } else if ($request->tipe == "month") {
                    $tahun = explode("-", $request->from_date);
                    $data = Transaction::whereMonth('created_at', '=', $tahun[1])
                        ->whereYear('created_at', '=', $tahun[0])
                        ->get();
                } else if ($request->tipe == "daily") {
                    $data = Transaction::whereDate('created_at', '=', $request->from_date)
                        ->get();
                }
            } else {
                $data = Transaction::all();
            }
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('kelurahan', function ($data) {
                    return $data->city->kelurahan->name;
                })
                ->addColumn('petugas', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('surat', $surat)
                ->addColumn('biaya', 'Rp. ' . number_format($biaya))
                ->addColumn('muatan', $muatan)
                ->make(true);
        }
    }
}
