<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Role::class);
    }

    public function isSuper()
    {
       if ($this->roles->contains('key', 'superuser')) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if ( $this->isSuper() ) {
            return true;
        }
        
        if ( is_string($role) ) {
            return $this->role->contains('key', $role);
        }
        return !! $this->roles->intersect($role)->count();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('key', $role)->first();
        }

        return $this->roles()->attach($role);
    }

    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('key', $role)->first();
        }

        return $this->roles()->detach($role);
    }
}
