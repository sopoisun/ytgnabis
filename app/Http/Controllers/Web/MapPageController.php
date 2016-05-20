<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class MapPageController extends SiteController
{
    public function index()
    {
        if( request()->get('q') && request()->get('lat') && request()->get('lng') ){
            $this->values['data']   = $this->front->Map();
            $this->values['params'] = request()->all();
        }

        return view(config('app.frontend_template').'.map.map', $this->values);
    }

    public function load()
    {
        return $this->front->Map();
    }

    public function clear()
    {
        return request()->session()->forget('businesses_loaded');
    }
}
