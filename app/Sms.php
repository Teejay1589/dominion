<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'message', 'user_id',
    ];

    public static function table()
    {
        return 'sms';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function sms_patients()
    {
        return $this->hasMany('App\SmsPatient', 'sms_id');
    }
}
