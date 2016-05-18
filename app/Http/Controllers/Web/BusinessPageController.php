<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;

class BusinessPageController extends SiteController
{
    public function index()
    {
        $data = Business::with(['seo', 'categories'])->where('active', 1)->orderBy('name')->paginate(8);

        $this->values['data'] = $data;

        if( !$data->count() )
        {
            $this->values['no_data'] = "<p>Tidak ada data bisnis di halaman ini</p>";
        }

        return view(config('app.frontend_template').'.business.businesses', $this->values);
    }
}
