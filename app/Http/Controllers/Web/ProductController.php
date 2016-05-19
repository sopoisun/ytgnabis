<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\BusinessProduct;
use App\ProductCategory;

class ProductController extends SiteController
{
    public function index()
    {
        $categories = ProductCategory::with('seo')->where('active', 1)->get();
        $this->values['categories'] = $categories;

        $this->values["data"] = BusinessProduct::with(['seo', 'business', 'category'])
                                ->find($this->values['relation_id']);

        return view(config('app.frontend_template').'.products.product', $this->values);
    }
}
