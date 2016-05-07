<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;

class BusinessProduct extends SeoModel
{
    protected $fillable = ['business_id', 'seo_id', 'name', 'price', 'image_url', 'product_category_id',
                                'counter', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function business()
    {
    	return $this->belongsTo(Business::class);
    }

    public function category()
    {
    	return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public static function seoIdAttribute()
    {
        return "PROD-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "ProductController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
}
