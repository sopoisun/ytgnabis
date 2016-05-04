<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['name', 'address', 'map_lat', 'map_long', 'phone', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

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
}
