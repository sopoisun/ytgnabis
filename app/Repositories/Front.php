<?php

namespace App\Repositories;

use App\Business;
use App\Category as BusinessCategory;
use App\BusinessProduct as Product;
use App\ProductCategory;
use App\Post;
use App\PostCategory;
use App\Page;
use App\Setting;
use Carbon\Carbon;
use DB;
use Cache;

class Front
{
    public function showInMenu()
    {
        return Page::join('seos', 'pages.seo_id', '=', 'seos.seo_id')
            ->where('pages.active', 1)->where('show_in_menu', 1)->orderBy('sort')
            ->select(['pages.page_title', 'seos.permalink'])->get();
    }

    public function setting()
    {
        return Setting::first();
    }

    public function BusinessCategories()
    {
        return BusinessCategory::join('seos', 'categories.seo_id', '=', 'seos.seo_id')
            ->where('categories.active', 1)->select([
                'categories.name', 'seos.permalink', 'categories.seo_id',
            ]);
    }

    public function Businesses()
    {
        return Business::join('seos', 'businesses.seo_id', '=', 'seos.seo_id')
            ->join('business_category', 'businesses.id', '=', 'business_category.business_id')
            ->join('categories', 'business_category.category_id', '=', 'categories.id')
            ->where('businesses.active', 1)->select([
                'businesses.name', 'businesses.address', 'businesses.map_lat', 'businesses.map_long',
                'businesses.phone', 'businesses.image_url', 'businesses.about', 'businesses.counter',
                'seos.permalink', DB::raw('GROUP_CONCAT(categories.name SEPARATOR ", ")as categories')
            ])->groupBy('businesses.id');
    }

    public function BusinessPopular($limit = 5)
    {
        return $this->Businesses()->orderBy('businesses.counter', 'desc')->limit($limit)->get();
    }

    public function ProductCategories()
    {
        return ProductCategory::join('seos', 'product_categories.seo_id', '=', 'seos.seo_id')
            ->where('product_categories.active', 1)->select([
                'product_categories.name', 'seos.permalink', 'product_categories.seo_id',
            ]);
    }

    public function Products()
    {
        return Product::join('seos', 'business_products.seo_id', '=', 'seos.seo_id')
            ->join('product_categories', 'business_products.product_category_id', '=', 'product_categories.id')
            ->join('businesses', 'business_products.business_id', '=', 'businesses.id')
            ->where('business_products.active', 1)->select([
                'business_products.name', 'business_products.price', 'business_products.image_url',
                'business_products.about', 'business_products.counter',
                DB::raw('business_products.product_category_id as category_id'),
                'seos.permalink', DB::raw('product_categories.name as category'),
                DB::raw('businesses.name as business'), DB::raw('businesses.address as address'),
            ]);
    }

    public function ProductPopular($limit = 4)
    {
        return $this->Products()->orderBy('business_products.counter', 'desc')->limit($limit)->get();
    }

    public function ProductSame($category_id, $name, $current_id)
    {
        $keys = explode(' ', $name);

        return $this->Products()->where('business_products.product_category_id', $category_id)
            ->where('business_products.id', '!=', $current_id)
            ->where(function($query) use ($keys) {
                foreach ($keys as $key) {
                    $query->OrWhere('business_products.name', 'like', '%'.$key.'%');
                }
            })
            ->orderBy(DB::raw('RAND()'))->limit(3)->get();
    }

    public function PostCategories()
    {
        return PostCategory::join('seos', 'post_categories.seo_id', '=', 'seos.seo_id')
            ->where('post_categories.active', 1)->select([
                'post_categories.name', 'seos.permalink', 'post_categories.seo_id',
            ]);
    }

    public function Posts()
    {
        return Post::join('seos', 'posts.seo_id', '=', 'seos.seo_id')
            ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.active', 1)->select([
                'posts.post_title', DB::raw('users.name as user_name'), 'posts.isi', 'posts.counter',
                'seos.permalink', DB::raw('post_categories.name as category'), 'posts.created_at',
            ]);
    }

    public function PostArchives()
    {
        return Post::where('active', 1)->groupBy(DB::raw('SUBSTRING(created_at, 1, 7)'))
            ->orderBy('created_at', 'desc')->limit(10)
            ->select([
                DB::raw('SUBSTRING(created_at, 1, 7)tanggal'),
            ])->get();
    }

    public function Map()
    {
        if( request()->get('q') && request()->get('lat') && request()->get('lng') ){
            $q      = request()->get('q');
            $lat    = request()->get('lat');
            $lng    = request()->get('lng');

            $businessLoaded = request()->session()->has('businesses_loaded') ?
                request()->session()->get('businesses_loaded') : [];

            $businesses = Business::join('business_products', 'businesses.id', '=', 'business_products.business_id')
                ->join('seos', 'businesses.seo_id', '=', 'seos.seo_id')
                ->whereNotIn('businesses.id', $businessLoaded)
                ->where('business_products.name', 'like', '%'.$q.'%')
                ->groupBy('businesses.id')
                ->select([
                    'businesses.id', 'businesses.name', 'businesses.map_lat',
                    'businesses.map_long', 'seos.permalink',
                    DB::raw("(6371 * ACOS(COS(RADIANS($lat)) * COS(RADIANS(businesses.map_lat)) * COS(
                            RADIANS(businesses.map_long) - RADIANS($lng)) + SIN(RADIANS($lat)) *
                            SIN(RADIANS(businesses.map_lat)))) AS distance "),
                ])
                ->having('distance', '<', '1')
                ->get();

            $businessLoaded = array_merge($businessLoaded, array_column($businesses->toArray(), 'id'));
            request()->session()->put('businesses_loaded', $businessLoaded);

            return $businesses;
        }

        return [];
    }

    public function Cache($type, $id)
    {
        if ( !Cache::has($type.'_'.$id) ) {
            $model = false;
            switch ($type) {
                case 'post':
                    $model = Post::find($id);
                    break;
                case 'product':
                    $model = Product::find($id);
                    break;
                case 'business':
                    $model = Business::find($id);
                    break;
                default:
                    $model = false;
                    break;
            }

            if( $model ){
                $model->counter = $model->counter+1;
                if ($model->save()) {
                    Cache::add($type.'_'.$id, $type.'_'.$id.'_chached', Carbon::now()->addDay());
                }
            }
        }
    }
}
