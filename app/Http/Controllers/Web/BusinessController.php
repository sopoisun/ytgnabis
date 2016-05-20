<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class BusinessController extends SiteController
{
    public function index()
    {
        $categories = $this->front->BusinessCategories()->get();
        $this->values['categories'] = $categories;

        $this->values['data'] = $this->front->Businesses()
            ->where('businesses.id', $this->values['relation_id'])->first();

        return view(config('app.frontend_template').'.business.business', $this->values);
    }
}
