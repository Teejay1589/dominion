<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id', 'gender', 'phone', 'date_of_birth', 'address', 'country', 'state', 'job',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function full_name()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function cases()
    {
        return $this->hasMany('App\Cases');
    }
}
