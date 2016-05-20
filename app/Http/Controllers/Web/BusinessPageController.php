<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class BusinessPageController extends SiteController
{
    public function index()
    {
        $data = $this->front->Businesses();

        if( request()->get('cari') ){
            $cari =  str_replace('-', ' ', request()->get('cari'));
            $data->where('businesses.name', 'like', '%'.$cari.'%');
        }

        $data = $data->orderBy('businesses.name')->paginate(8);

        $this->values['data'] = $data;

        $categories = $this->front->BusinessCategories()->get();
        $this->values['categories'] = $categories;

        if( !$data->count() )
        {
            $this->values['no_data'] = "<p>Tidak ada data bisnis di halaman ini</p>";
        }

        return view(config('app.frontend_template').'.business.businesses', $this->values);
    }
}
