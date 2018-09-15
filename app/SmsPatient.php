<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsPatient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sms_id', 'patient_id',
    ];

    public static function table()
    {
        return 'sms';
    }

    public function sms()
    {
        return $this->belongsTo('App\Sms', 'sms_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function user()
    {
        return optional($this->sms)->user;
    }
}
