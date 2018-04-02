<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_blocked', 'role_id', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_blocked' => 'boolean',
    ];

    public function table()
    {
        return $this->table;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'user_id');
    }

    public function patients()
    {
        return $this->hasMany('App\Patients', 'user_id');
    }

    public function cases()
    {
        return $this->hasMany('App\Cases', 'user_id');
    }
}
