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
        $this->values["data"] = BusinessProduct::with(['seo', 'business', 'category'])
                                ->find($this->values['relation_id']);

        return view(config('app.frontend_template').'.products.product', $this->values);
    }
}
