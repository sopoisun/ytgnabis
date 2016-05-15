<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class PageController extends SiteController
{
    public function index()
    {
        return $this->values['seo']->load('page');
    }
}
