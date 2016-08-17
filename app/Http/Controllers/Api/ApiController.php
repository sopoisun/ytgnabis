<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    public function kecamatans()
    {
        return \App\Kecamatan::where('active', 1)->get();
    }

    public function businessCategories()
    {
        return \App\Category::where('active', 1)->get();
    }

    public function productCategories()
    {
        return \App\ProductCategory::where('active', 1)->get();
    }

    public function businesses(Request $request)
    {
        $businesses = \App\Business::with('categories')->where('active', 1);

        if( $request->get('kecamatan_id') ){
            $kecamatan_id = $request->get('kecamatan_id');
            $businesses->where('kecamatan_id', $kecamatan_id);
        }

        if( $request->get('category_id') ){
            $category_id = $request->get('category_id');
            $businesses->whereHas('categories', function($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
        }

        return $businesses->paginate(5);
    }

    public function business(Request $request)
    {
        $id = $request->get('id');
        $business = \App\Business::with(['categories'])->find($id);
        $products = \App\BusinessProduct::with(['category'])
                    ->where('business_id', $business->id)
                    ->orderBy('product_category_id');

        if( $request->get('q') ){ // produk search query
            $q = $request->get('q');
            $products->where('name', 'like', '%'.$q.'%');
        }

        return [
            'business' => $business,
            'products' => $products->paginate(5),
        ];
    }

    public function business_products(Request $request)
    {
        $id = $request->get('business_id');
        $products = \App\BusinessProduct::with(['category'])
                    ->where('business_id', $id)
                    ->orderBy('product_category_id');

        if( $request->get('q') ){ // produk search query
            $q = $request->get('q');
            $products->where('name', 'like', '%'.$q.'%');
        }

        return $products->paginate(5);
    }

    public function products(Request $request)
    {
        $products = \App\BusinessProduct::with('business')->where('active', 1);

        if( $request->get('kecamatan_id') ){
            $kecamatan_id = $request->get('kecamatan_id');
            $products->whereHas('business', function($query) use ($kecamatan_id) {
                $query->where('kecamatan_id', $kecamatan_id);
            });
        }

        if( $request->get('category_id') ){
            $category_id = $request->get('category_id');
            $products->where('product_category_id', $category_id);
        }

        if( $request->get('q') ){
            $q = $request->get('q');
            $products->where('name', 'like', '%'.$q.'%');
        }

        return $products->paginate(5);
    }

    public function product(Request $request)
    {
        $id = $request->get('id');
        return \App\BusinessProduct::with(['business', 'category'])->find($id);
    }

    public function map()
    {
        if( request()->get('q') && request()->get('lat') && request()->get('lng') ){
            $q      = request()->get('q');
            $lat    = request()->get('lat');
            $lng    = request()->get('lng');

            return \App\Business::join('business_products', 'businesses.id', '=', 'business_products.business_id')
                ->join('seos', 'businesses.seo_id', '=', 'seos.seo_id')
                ->where('business_products.name', 'like', '%'.$q.'%')
                ->groupBy('businesses.id')
                ->select([
                    'businesses.id', DB::raw('businesses.id as business_id'), 'businesses.name', 'businesses.map_lat',
                    'businesses.map_long', 'seos.permalink',
                    DB::raw("(6371 * ACOS(COS(RADIANS($lat)) * COS(RADIANS(businesses.map_lat)) * COS(
                            RADIANS(businesses.map_long) - RADIANS($lng)) + SIN(RADIANS($lat)) *
                            SIN(RADIANS(businesses.map_lat)))) AS distance "),
                ])
                ->having('distance', '<', '0.5')
                ->get();
        }
    }
}
