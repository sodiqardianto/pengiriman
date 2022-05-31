<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zona = Zona::all();
        return view('zona.index', compact('zona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zona.create');
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
        $request->validate(
            [
                'zona'  =>  'required',
                'harga25'=>'required',
                'harga50'=>'required',
                'harga100'=>'required',
                'km'=>'required'
            ]
        );

        $input = Zona::create([
            'zona'  =>  strtolower($request->zona),
            'harga25'=>$request->harga25,
            'harga50'=>$request->harga50,
            'harga100'=>$request->harga100,
            'km'=>$request->km
        ]);
        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('zona')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('createZona')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function edit(Zona $zona)
    {
        return view('zona.edit', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'zona'  =>  'required',
                'harga25'=>'required',
                'harga50'=>'required',
                'harga100'=>'required',
                'km'=>'required'
            ]
        );

        $input = Zona::find($id)->update([
            'zona'  =>  strtolower($request->zona),
            'harga25'=>$request->harga25,
            'harga50'=>$request->harga50,
            'harga100'=>$request->harga100,
            'km'=>$request->km
        ]);
        
        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('zona')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('editZona')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Zona::destroy($id);

        if ($delete == 1) {
            $success = true;
            $message = "Zona deleted successfully";
        } else {
            $success = true;
            $message = "Zona not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
