<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Business;

class BusinessCategoryController extends SiteController
{
    public function index()
    {
        return Business::with('seo')->whereHas('categories', function($query) {
            $query->where('id', $this->values['relation_id']);
        })->where('active', 1)->orderBy('name')->get();
    }
}
