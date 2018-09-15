<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'patient_id', 'type', 'title', 'subjects', 'objects', 'assessment', 'plans', 'summary', 'successful_delivery', 'discharged_on',
    ];

    protected $casts = [
        'successful_delivery' => 'boolean',
    ];

    public static function table()
    {
        return 'visits';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function visit_doctors()
    {
        return $this->hasMany('App\VisitDoctors', 'visit_id');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Surgery', 'visit_id');
    }

    public function billings()
    {
        return $this->hasMany('App\Billing', 'visit_id');
    }
}
