<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function bikes()
    {
        return $this->hasMany(Bike::class);
    }

    public function codes()
    {
        return $this->hasMany(Code::class);
    }
    
    public function asignarRole($role)
    {
        $this->roles()->sync($role, false);
    }

    public function tieneRole()
    {
        return $this->roles->flatten()->pluck('name')->unique();
    }

    public function tieneBike()
    {
        return $this->bikes->flatten()->pluck('user_id')->unique();
    }
}
