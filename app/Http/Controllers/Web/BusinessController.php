<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Front;

class BusinessController extends SiteController
{
    public function index()
    {
        $categories = Front::BusinessCategories()->get();
        $this->values['categories'] = $categories;

        $this->values['data'] = Front::Businesses()
            ->where('businesses.id', $this->values['relation_id'])->first();

        return view(config('app.frontend_template').'.business.business', $this->values);
    }
}
