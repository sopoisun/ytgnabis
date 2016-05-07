<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;

class Business extends SeoModel
{
    protected $fillable = ['name', 'seo_id', 'address', 'map_lat', 'map_long', 'phone', 'counter', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(BusinessProduct::class);
    }

    public function addCategory($category)
    {
        if (is_string($category)) {
            $category = Category::where('name', $category)->first();
        }

        return $this->categories()->attach($category);
    }

    public function removeCategory($category)
    {
        if (is_string($category)) {
            $category = Category::where('name', $category)->first();
        }

        return $this->categories()->detach($category);
    }

    public static function seoIdAttribute()
    {
        return "BSN-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "BusinessController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
}
