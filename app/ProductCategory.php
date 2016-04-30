<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['name', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->hasMany(BusinessProduct::class);
    }
}
