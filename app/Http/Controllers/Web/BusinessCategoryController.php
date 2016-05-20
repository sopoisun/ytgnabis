<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Front;

class BusinessCategoryController extends SiteController
{
    public function index()
    {
        $data = Front::Businesses()->where('business_category.category_id', $this->values['relation_id'])
                ->orderBy('businesses.name')->paginate(8);

        $this->values['data'] = $data;

        $categories = Front::BusinessCategories()->get();
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
