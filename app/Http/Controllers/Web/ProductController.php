<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\BusinessProduct;

class ProductController extends SiteController
{
    public function index()
    {
        return BusinessProduct::with(['seo', 'business', 'category'])
                ->find($this->values['relation_id']);
    }
}
