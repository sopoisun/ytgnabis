<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;

class Post extends SeoModel
{
    protected $fillable = ['post_title', 'seo_id', 'isi', 'user_id', 'post_category_id',
                            'publish', 'active', 'counter'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function seoIdAttribute()
    {
        return "POST-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "PostController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
}
