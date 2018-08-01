<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table', 'action', 'user_id',
    ];

    public static function table()
    {
        return 'user_permissions';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
