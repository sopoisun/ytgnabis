<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = ['name', 'seo_id', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }
    
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public static function seoIdAttribute()
    {
        return "PSCAT-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "PostCategoryController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
}
