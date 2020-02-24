<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'divisi', 'level', 'skill', 'leader', 'email', 'handphone',
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

    // Relasi antara Tabel User dengan tabel lainnya || One To Many Relationship
    //public function dapros_statistics_calls()
    public function users()
    {
        return $this->hasMany('App\_dapros_statistics', 'call_agent_username', 'username');
    }
    /*public function dapros_statistics_tappings()
    {
        return $this->hasMany('App\_dapros_statistics', 'tapping_agent_username', 'username');
    }*/
    public function calls()
    {
        return $this->hasMany('App\_call', 'call_agent_username', 'username');
    }
    public function tappings()
    {
        return $this->hasMany('App\_tapping', 'tapping_agent_username', 'username');
    }

}
