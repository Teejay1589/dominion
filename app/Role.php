<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
    ];

    public function table()
    {
        return $this->table;
    }

    public function users()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
