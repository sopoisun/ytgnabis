<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable     = ['phone', 'email', 'facebook', 'twitter', 'g_plus', 'youtube', 'instagram',
                                'alamat', 'map_latitude', 'map_longitude', 'about_us'];
    protected $hidden       = ['created_at', 'updated_at'];
}
