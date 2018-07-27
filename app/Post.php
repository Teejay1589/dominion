<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public static function table()
    {
        return 'posts';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
