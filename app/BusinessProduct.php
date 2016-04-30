<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessProduct extends Model
{
    protected $fillable = ['business_id', 'name', 'price', 'image_url', 'product_category_id', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function business()
    {
    	return $this->belongsTo(Business::class);
    }

    public function category()
    {
    	return $this->belongsTo(ProductCategory::class);
    }
}
