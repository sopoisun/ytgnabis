<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class ContactController extends SiteController
{
    public function index()
    {
        return "Contact Controller";
    }
}
