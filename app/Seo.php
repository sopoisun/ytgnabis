<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable     = [ 'permalink', 'relation_id', 'seo_id', 'controller', 'function',
                                'site_title', 'description', 'keywords' ];
    protected $hidden       = ['created_at', 'updated_at'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'seo_id', 'seo_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'seo_id', 'seo_id');
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'seo_id', 'seo_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'seo_id', 'seo_id');
    }

    public function businessCategory()
    {
        return $this->belongsTo(Category::class, 'seo_id', 'seo_id');
    }

    public function product()
    {
        return $this->belongsTo(BusinessProduct::class, 'seo_id', 'seo_id');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'seo_id', 'seo_id');
    }
}
