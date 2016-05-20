<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BusinessBaseController extends SiteController
{
    public function __construct()
    {
        parent::__construct();

        $this->values['categories']     = $this->front->BusinessCategories()->get();
        $this->values['productPopular'] = $this->front->ProductPopular();
    }
}
