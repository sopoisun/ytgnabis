<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class BlogController extends SiteController
{
    public function index()
    {
        return "Blog Controller";
    }
}
