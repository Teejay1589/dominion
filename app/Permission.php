<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table', 'action', 'permit',
    ];

    public static function table()
    {
        return 'permissions';
    }
}
