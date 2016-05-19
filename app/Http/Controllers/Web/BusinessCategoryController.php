<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;
use App\Category;

class BusinessCategoryController extends SiteController
{
    public function index()
    {
        $data = Business::with(['seo', 'categories'])->whereHas('categories', function($query) {
            $query->where('id', $this->values['relation_id']);
        })->where('active', 1)->orderBy('name')->paginate(8);

        $this->values['data'] = $data;

        $categories = Category::with('seo')->where('active', 1)->get();
        $this->values['categories'] = $categories;

        $this->values['seo']['business'] = $categories->where('seo_id', $this->values['seo_id'])->first();

        if( !$data->count() )
        {
            $category = $this->values['seo']['business']['name'];
            $this->values['no_data'] = "<p>Tidak ada bisnis dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.business.businesses', $this->values);
    }
}
