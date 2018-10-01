<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'done', 'user_id',
    ];

    public static function table()
    {
        return 'reminders';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}