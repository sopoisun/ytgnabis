<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Business;
use App\Category as BusinessCategory;
use App\BusinessProduct as Product;
use App\ProductCategory;
use App\Post;
use App\PostCategory;
use App\Page;
use DB;

class Front extends Model
{
    public static function showInMenu()
    {
        return Page::join('seos', 'pages.seo_id', '=', 'seos.seo_id')
            ->where('pages.active', 1)->where('show_in_menu', 1)->orderBy('sort')
            ->select(['pages.page_title', 'seos.permalink'])->get();
    }

    public static function BusinessCategories()
    {
        return BusinessCategory::join('seos', 'categories.seo_id', '=', 'seos.seo_id')
            ->where('categories.active', 1)->select([
                'categories.name', 'seos.permalink', 'categories.seo_id',
            ]);
    }

    public static function Businesses()
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

    public static function ProductCategories()
    {
        return ProductCategory::join('seos', 'product_categories.seo_id', '=', 'seos.seo_id')
            ->where('product_categories.active', 1)->select([
                'product_categories.name', 'seos.permalink', 'product_categories.seo_id',
            ]);
    }

    public static function Products()
    {
        return Product::join('seos', 'business_products.seo_id', '=', 'seos.seo_id')
            ->join('product_categories', 'business_products.product_category_id', '=', 'product_categories.id')
            ->join('businesses', 'business_products.business_id', '=', 'businesses.id')
            ->where('business_products.active', 1)->select([
                'business_products.name', 'business_products.price', 'business_products.image_url',
                'business_products.about', 'business_products.counter',
                'seos.permalink', DB::raw('product_categories.name as category'),
                DB::raw('businesses.name as business'), DB::raw('businesses.address as address'),
            ]);
    }

    public static function PostCategories()
    {
        return PostCategory::join('seos', 'post_categories.seo_id', '=', 'seos.seo_id')
            ->where('post_categories.active', 1)->select([
                'post_categories.name', 'seos.permalink', 'post_categories.seo_id',
            ]);
    }

    public static function Posts()
    {
        return Post::join('seos', 'posts.seo_id', '=', 'seos.seo_id')
            ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.active', 1)->select([
                'posts.post_title', DB::raw('users.name as user_name'), 'posts.isi', 'posts.counter',
                'seos.permalink', DB::raw('post_categories.name as category'), 'posts.created_at',
            ]);
    }
}
