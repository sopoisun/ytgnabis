<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BusinessBaseController;

class BusinessCategoryController extends BusinessBaseController
{
    public function index()
    {
        $data = $this->front->Businesses()->where('business_category.category_id', $this->values['relation_id'])
                ->orderBy('businesses.name')->paginate(8);

        $this->values['data'] = $data;

        $this->values['seo']['business'] = $this->values['categories']->where('seo_id', $this->values['seo_id'])->first();

        $this->values['breadcrumbs'] = array_merge($this->values['breadcrumbs'], [
            [ 'title' => $this->values['seo']['business']['name'], 'url' => $this->values['permalink'] ],
        ]);

        if( !$data->count() )
        {
            $category = $this->values['seo']['business']['name'];
            $this->values['no_data'] = "<p>Tidak ada bisnis dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.business.businesses', $this->values);
    }
}
