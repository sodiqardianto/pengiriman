<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jabatan' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'alamat' => 'required',
        ]);

        $input = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
        ]);
        if ($request->jabatan == 'user') {
            $input->assignRole('user');
        } else {
            $input->assignRole('finance');
        }

        if ($input) {
            //redirect dengan pesan sukses
            return redirect('users')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect('users/create')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->password == '') {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'jabatan' => 'required',
                'alamat' => 'required',
            ]);

            $input = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'jabatan' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
                'alamat' => 'required',
            ]);

            $input = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'jabatan' => $request->jabatan,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat,
            ]);
        }

        if ($input) {
            //redirect dengan pesan sukses
            return redirect('users')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect('users')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::destroy($id);

        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
