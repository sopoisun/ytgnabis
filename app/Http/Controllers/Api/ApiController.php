<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function kecamatans()
    {
        return \App\Kecamatan::all();
    }

    public function businessCategories()
    {
        return \App\Category::where('active', 1)->get();
    }

    public function productCategories()
    {
        return \App\ProductCategory::where('active', 1)->get();
    }
}
