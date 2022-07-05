<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\DetailTransaction;
use App\Models\Province;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::whereDate('created_at','=',date('Y-m-d'))->get();
        // $transaction = Transaction::all();
        return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kelurahan = City::all();
        $provinsi = Province::all();
        return view('transaction.create', compact('provinsi',"kelurahan"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $city = City::where('village_id',$request->kelurahan)->first();
        if($city==false){
            return redirect()->route('createTransaction')->with(['error' => 'Kelurahan Belum Terdaftar!']);
        }
        $request->validate(
            [
                'name' => 'required',
                'no_telp' => 'required',
                // 'provinsi'  => 'required',
                // 'kabupaten'  => 'required',
                // 'kecamatan'  => 'required',
                'kelurahan'  => 'required',
            ]
        );

        
        
        $input = Transaction::create([
            'nama'  =>  strtolower($request->name),
            'user_id' => Auth::user()->id,
            'no_telp' => $request->no_telp,
            'city_id' => $city->id
        ]);
        
        $last = Transaction::max('id');
        foreach ($request->input('mobil') as $key => $value) {
            DetailTransaction::create([
                'transaction_id' => $input->id,
                'muatan' => $value
            ]);
        }
        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('transaction')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('createTransaction')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function check(Request $request){
        $p = Transaction::where('no_telp', $request->id)->first();
        return response()->json($p);
    }

    

    
}
