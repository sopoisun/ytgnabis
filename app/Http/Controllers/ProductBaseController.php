<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductBaseController extends SiteController
{
    public function __construct()
    {
        parent::__construct();

        $this->values['categories']     = $this->front->ProductCategories()->get();
        $this->values['productPopular'] = $this->front->ProductPopular();
    }
}
