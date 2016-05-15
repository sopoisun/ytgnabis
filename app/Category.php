<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;

class Category extends SeoModel
{
    protected $fillable = ['name', 'seo_id', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    /* Relation */
    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function businesses()
    {
        return $this->belongsToMany(Business::class);
    }
    /* end Relation */

    /* Seo override */
    public static function seoIdAttribute()
    {
        return "CAT-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "BusinessCategoryController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* end Seo override */
}
