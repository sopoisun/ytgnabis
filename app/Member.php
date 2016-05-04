<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'address', 'phone', 'photo'];
    protected $hidden   = ['created_at', 'updated_at'];
}
