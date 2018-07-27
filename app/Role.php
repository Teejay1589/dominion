<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public static function table()
    {
        return 'roles';
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
