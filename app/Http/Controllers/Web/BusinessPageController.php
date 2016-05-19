<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;
use App\Category;

class BusinessPageController extends SiteController
{
    public function index()
    {
        $data = Business::with(['seo', 'categories'])->where('active', 1);

        if( request()->get('cari') ){
            $cari =  str_replace('-', ' ', request()->get('cari'));
            $data->where('name', 'like', '%'.$cari.'%');
        }

        $data = $data->orderBy('name')->paginate(8);

        $this->values['data'] = $data;

        $categories = Category::with('seo')->where('active', 1)->get();
        $this->values['categories'] = $categories;

        if( !$data->count() )
        {
            $this->values['no_data'] = "<p>Tidak ada data bisnis di halaman ini</p>";
        }

        return view(config('app.frontend_template').'.business.businesses', $this->values);
    }
}
