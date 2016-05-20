<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\SiteController;

class ProductController extends SiteController
{
    public function index()
    {
        $categories = $this->front->ProductCategories()->get();
        $this->values['categories'] = $categories;

        $this->values["data"] = $this->front->Products()
            ->where('business_products.id', $this->values['relation_id'])->first();

        return view(config('app.frontend_template').'.products.product', $this->values);
    }
}
