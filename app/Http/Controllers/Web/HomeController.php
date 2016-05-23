<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class HomeController extends SiteController
{
    public function index()
    {
        $this->values['productPopular']     = $this->front->ProductPopular(8);
        $this->values['businessPopular']    = $this->front->BusinessPopular(5);

        return view(config('app.frontend_template').'.home.home', $this->values);
    }
}
