<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RoleRequest;
use App\Role;
use App\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
             'roles' => Role::where('key', '!=', 'superuser')->paginate(10),
         ];

         return view(config('app.backend_template').'.role.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::select([
            'permissions.*', DB::raw('SUBSTRING(`key`, 1, LOCATE(".", `key`)-1)AS `group_key`')
        ])->get();

        $data = [ 'permissions' => $permissions ];
        return view(config('app.backend_template').'.role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());

        if( $role ){
            $permissions = $request->get('permissions') != "" ? $request->get('permissions') : [];
            $role->addPermission($permissions);

            return redirect('/backend/role')->with('success', 'Sukses simpan role.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan role.']);
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
    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);

        if( !$role ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'role'          => $role,
            'permissions'   => Permission::select(['permissions.*', DB::raw('SUBSTRING(`key`, 1, LOCATE(".", `key`)-1)AS `group_key`')])->get(),
        ];

        return view(config('app.backend_template').'.role.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::with('permissions')->find($id);

        $inPermission   = $request->get('permissions') != "" ? $request->get('permissions') : [];
        $rolePermission = array_column($role->permissions->toArray(), 'id');

        if( $role->update($request->all()) ){
            // for new permissions
            $newPermission = array_diff($inPermission, $rolePermission);
            if( count($newPermission) ){
                $role->addPermission($newPermission);
            }
            // for delete permissions
            $deletePermission = array_diff($rolePermission, $inPermission);
            if( count($deletePermission) ){
                $role->removePermission($deletePermission);
            }

            return redirect('/backend/role')->with('success', 'Sukses ubah role.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah role.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        if( $role && $role->delete() ){
            return redirect()->back()->with('success', 'Sukses hapus role.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus role.']);
    }
}
