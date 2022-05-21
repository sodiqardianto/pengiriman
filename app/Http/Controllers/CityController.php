<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Zona;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::all();
        return view('city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zona = Zona::all();
        return view('city.create',compact('zona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [   
                'kota'=>'required',
                'zona'  =>  'required',
                'km'=>'required'
            ]
        );

        $input = City::create([
            'kota'=>strtolower($request->kota),
            'zona_id'  =>  strtolower($request->zona),
            'km'=>$request->km
        ]);

        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('city')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('createCity')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $zona=Zona::all();
        return view('city.edit', compact('city','zona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [   
                'kota'=>'required',
                'zona'  =>  'required',
                'km'=>'required'
            ]
        );

        $input = City::find($id)->update([
            'kota'=>strtolower($request->kota),
            'zona_id'  =>  strtolower($request->zona),
            'km'=>$request->km
        ]);

        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('city')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('editCity')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = City::destroy($id);

        if ($delete == 1) {
            $success = true;
            $message = "City deleted successfully";
        } else {
            $success = true;
            $message = "City not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function price(Request $request)
    {
        $p = Zona::where('id', $request->id)->first();
        return response()->json($p);
    }
}
