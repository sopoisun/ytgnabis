<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use Validator;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth('web')->user()->id;
        $users = User::whereNotIn('id', [$id])->where('active', 1)->get();

        $data = [
            'users' => $users,
        ];

        return view(config('app.backend_template').'.user.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'roles' => Role::where('key', '!=', 'superuser')->get(),
        ];

        return view(config('app.backend_template').'.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->get('password'));

        $user =  User::create($inputs);

        if( $user ){
            $roles = $request->get('roles') != "" ? $request->get('roles') : [];
            $user->assignRole($roles);

            return redirect('/backend/user')->with('success', 'Sukses simpan data user.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data user.']);
    }

    public function edit($id)
    {
        $user = User::with(['roles'])->find($id);

        if( !$user ){
            return view(config('app.backend_template').'.error.404');
        }

        $roles  = Role::where('key', '!=', 'superuser')->get();
        $data   = ['roles' => $roles, 'user' => $user];
        return view(config('app.backend_template').'.user.update', $data);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::with(['roles'])->find($id);

        $inRoles   = $request->get('roles') != "" ? $request->get('roles') : [];
        $userRoles = array_column($user->roles->toArray(), 'id');

        // for new permissions
        $newRoles = array_diff($inRoles, $userRoles);
        if( count($newRoles) ){
            $user->assignRole($newRoles);
        }
        // for delete permissions
        $deleteRoles = array_diff($userRoles, $inRoles);
        if( count($deleteRoles) ){
            $user->revokeRole($deleteRoles);
        }

        return redirect('/backend/user')->with('success', 'Sukses ubah user.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if( $user && $user->update(['active' => 0]) ){
            return redirect()->back()->with('success', 'Sukses hapus user '.$user->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data user.']);
    }

    public function resetPassword($id)
    {
        $user = User::find($id);

        if( $user && $user->update(['password' => Hash::make('administrator')]) ){
            return redirect()->back()->with('success', 'Sukses reset password user '.$user->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal reset password user.']);
    }

    public function account(Request $request)
    {
        $act    = $request->get('act') ? $request->get('act') : 'profile';
        $acts   = ['profile', 'password'];

        if( in_array($act, $acts) ){
            $data = [
                'user'  => auth('web')->user(),
                'act'   => '/backend/save-'.$act,
            ];
            return view(config('app.backend_template').'.account.'.$act, $data);
        }

        return view(config('app.backend_template').'.error.404');
    }

    public function saveProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong.'
        ]);

        if( $validator->fails() ){
            return redirect()->back()->withInput()
                ->withErrors($validator);
        }

        $res = auth('web')->user()->update($request->all());

        if( $res ){
            return redirect()->back()->with('success', 'Sukses ubah profile akun.');
        }

        return redirect()->back()->with('failed', 'Gagal ubah profile akun.');
    }

    public function savePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ], [
            'old_password.required' => 'Password lama tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.confirmed' => 'Password konfirmasi tidak sama.'
        ]);

        if( $validator->fails() ){
            return redirect()->back()->withInput()
                ->withErrors($validator);
        }

        $user = auth('web')->user();

        if( Hash::check($request->get('old_password'), $user->password) ){
            $res = $user->update([
                'password' => Hash::make($request->get('password')),
            ]);

            if( $res ){
                return redirect()->back()->with('success', 'Sukses ubah password akun.');
            }
        }else{
            return redirect()->back()->with('warning', 'Password lama tidak sama.');
        }

        return redirect()->back()->with('failed', 'Gagal ubah password akun.');
    }
}
