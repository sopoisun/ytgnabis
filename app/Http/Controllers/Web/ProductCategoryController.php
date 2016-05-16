<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\BusinessProduct;

class ProductCategoryController extends SiteController
{
    public function index()
    {
        $style  = request()->get('style') ? request()->get('style') : "grid";
        $style  = in_array($style, ['grid', 'list']) ? $style : 'grid';


        return view(config('app.frontend_template').'.products.products-'.$style);

        return BusinessProduct::with(['seo', 'business'])
                ->where('product_category_id', $this->values['relation_id'])
                ->where('active', 1)->orderBy('name')->get();
    }
}
