<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;

class ProductCategory extends SeoModel
{
    protected $fillable = ['name', 'seo_id', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    /* Relation */
    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function products()
    {
        return $this->hasMany(BusinessProduct::class);
    }
    /* End Relation */

    /* Seo Override */
    public static function seoIdAttribute()
    {
        return "PCAT-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "ProductCategoryController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* end Seo Override */
}
