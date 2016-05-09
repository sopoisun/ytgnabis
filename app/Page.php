<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;

class Page extends SeoModel
{
    protected $fillable = ['page_title', 'seo_id', 'isi', 'show_in_menu', 'sort', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public static function seoIdAttribute()
    {
        return "PAGE-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "PageController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
}
