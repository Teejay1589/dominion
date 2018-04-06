<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $table = 'patients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'gender', 'telephone', 'next_of_kin', 'next_of_kin_telephone',  'blood_group',  'weight',  'height',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function cases()
    {
        return $this->hasMany('App\Cases', 'patient_id');
    }
}
