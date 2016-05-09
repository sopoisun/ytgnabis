<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view(config('app.backend_template').'.setting.form')
            ->with('setting', Setting::first());
    }

    public function save(SettingRequest $request)
    {
        if( Setting::find(1)->update($request->all()) ){
            return redirect()->back()
                ->with('success','Sukses ubah setting.');
        }

        return redirect()->back()->with('failed','Gagal ubah setting.');
    }
}
