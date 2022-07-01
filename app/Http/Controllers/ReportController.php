<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        $transaction = Transaction::all();
        return view('report.index', compact('transaction'));
    }

    public function reportMingguan(){
        $transaction = Transaction::all();
        return view('report.range', compact('transaction'));
    }

    public function reportBulanan(){
        $transaction = Transaction::all();
        return view('report.month', compact('transaction'));
    }

    public function dataReport(Request $request){
        $transaction = Transaction::all();
        $muatan=0;
        $biaya=0;
        $surat=0;
        foreach($transaction as $item){
            foreach ($item->details as $details ) {
                $muatan += $details->muatan;
                if($details->muatan==25){
                    $biaya +=$item->city->zona->harga25;
                }else if($details->muatan==50){
                    $biaya +=$item->city->zona->harga50;
                }else{
                    $biaya +=$item->city->zona->harga100;
                }
                $surat++;
            }
        }
            
        if (request()->ajax()) {
            
            if (!empty($request->from_date)) {
                // $data = DB::table('tbl_order')
                //     ->whereBetween('order_date', array($request->from_date, $request->to_date))
                //     ->get();
                $data = Transaction::whereDate('created_at', '>=', $request->from_date)
                    ->whereDate('created_at', '<=', $request->to_date)
                    ->get();
            } else {
                $data = Transaction::all();
            }
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('kelurahan',function($data){
                    return $data->city->kelurahan->name;
                })
                ->addColumn('petugas',function($data){
                    return $data->user->name;
                })
                ->addColumn('surat',$surat)
                ->addColumn('biaya','Rp. '.number_format($biaya))
                ->addColumn('muatan',$muatan)
                ->make(true);
            
        }
    }
}
