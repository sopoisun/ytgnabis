<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;
use App\Category;

class BusinessController extends SiteController
{
    public function index()
    {
        $categories = Category::with('seo')->where('active', 1)->get();
        $this->values['categories'] = $categories;

        $this->values['data'] = Business::with(['seo', 'categories', 'products' => function($query){
                                        $query->limit(6);
                                }])->find($this->values['relation_id']);

        return view(config('app.frontend_template').'.business.business', $this->values);
    }
}
