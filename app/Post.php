<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body', 'slug', 'image',
    ];

    public static function table()
    {
        return 'posts';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
