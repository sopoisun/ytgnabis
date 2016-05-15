<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class HomeController extends SiteController
{
    public function index()
    {
        return "Home Controller";
    }
}
