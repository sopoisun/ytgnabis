<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BusinessBaseController extends SiteController
{
    public function __construct()
    {
        parent::__construct();

        $categories = $this->front->BusinessCategories()->get();
        $this->values['categories'] = $categories;
    }
}
