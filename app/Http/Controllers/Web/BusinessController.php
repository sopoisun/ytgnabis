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
        return view(config('app.frontend_template').'.business.business');

        return Business::with('seo')->find($this->values['relation_id']);
    }
}
