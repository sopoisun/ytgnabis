<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;

class BusinessController extends SiteController
{
    public function index()
    {
        $this->values['data'] = Business::with(['seo', 'categories', 'products' => function($query){
                                        $query->limit(6);
                                    }])
                                    ->find($this->values['relation_id']);

        return view(config('app.frontend_template').'.business.business', $this->values);
    }
}
