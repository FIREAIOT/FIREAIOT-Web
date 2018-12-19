<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
     * Get all reported alarms by the current user.
     */
    public function alarms()
    {
        return $this->hasMany(Alarm::class);
    }

    /**
     * Get all reported alarms by the current user.
     */
    public function uavs()
    {
        return $this->hasMany(UAV::class);
    }
}
