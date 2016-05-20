<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostBaseController extends SiteController
{
    public function __construct()
    {
        parent::__construct();

        $categories = $this->front->PostCategories()->get();
        $this->values['categories'] = $categories;
    }
}
