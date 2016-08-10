<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use App\Business;
use App\Seo;
use Carbon\Carbon;

class Kecamatan extends SeoModel
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
        return $this->hasMany(Business::class, 'business_id', 'id');
    }
    /* end Relation */

    /* Seo override */
    public static function seoIdAttribute()
    {
        return "KEC-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "KecamatanController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* end Seo override */
}
