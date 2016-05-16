<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;

class BusinessCategoryController extends SiteController
{
    public function index()
    {
        $this->values['seo'] = $this->values['seo']->load('businessCategory');

        $data = Business::with(['seo', 'categories'])->whereHas('categories', function($query) {
            $query->where('id', $this->values['relation_id']);
        })->where('active', 1)->orderBy('name')->paginate(8);

        $this->values['data'] = $data;

        if( !$data->count() )
        {
            $category = $this->values['seo']['businessCategory']['name'];
            $this->values['no_data'] = "<p>Tidak ada bisnis dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.business.businesses', $this->values);
    }
}
