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

    public static function table()
    {
        return 'users';
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function visits()
    {
        return $this->hasMany('App\Visit');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Surgery');
    }

    public function billings()
    {
        return $this->hasMany('App\Billing');
    }
}
