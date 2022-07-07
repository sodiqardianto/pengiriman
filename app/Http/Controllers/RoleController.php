<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read-role|create-role|update-role|delete-role', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-role', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    public function createPermission()
    {
        return view('role.createPermission');
    }

    public function insertPermission(Request $request, Role $role)
    {
        $data = array(
            'create' . '-' . $request->permission,
            'read' . '-' . $request->permission,
            'update' . '-' . $request->permission,
            'delete' . '-' . $request->permission,
        );

        $request->validate(
            [
                'permission'  =>  'required',
            ]
        );

        for ($i = 0; $i < count($data); $i++) {
            $answers[] = [
                'name'  =>  strtolower($data[$i]),
                'guard_name'  =>  'web',
                'created_at'  =>  Carbon::now(),
                'updated_at'  =>  Carbon::now(),
            ];
        }
        $input = Permission::insert($answers);

        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('role')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('role')->with(['error' => 'Data Gagal Diperbarui!']);
        }
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
                'name'  =>  'required|unique:roles,name'
            ]
        );

        $input = Role::create([
            'name'  =>  strtolower($request->name)
        ]);

        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('createRole')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('createRole')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::get()->chunk(4);
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('role.akses', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(
            [
                'permission'  =>  'required'
            ]
        );

        $role->syncPermissions($request->permission);

        if ($role) {
            //redirect dengan pesan sukses
            return redirect()->route('aksesRole', $role->id)->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('aksesRole', $role->id)->with(['error' => 'Data Gagal Diperbarui!']);
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
        $delete = Role::destroy($id);

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
