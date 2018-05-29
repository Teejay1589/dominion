<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'patient_id', 'title', 'symptoms', 'treatment', 'medicine', 'is_consultation', 'is_emergency', 'is_delivery', 'is_success', 'discharged_on',
    ];

    protected $casts = [
        'is_consultation' => 'boolean',
        'is_emergency' => 'boolean',
        'is_delivery' => 'boolean',
        'is_success' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function case_doctors()
    {
        return $this->hasMany('App\CaseDoctors', 'case_id');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Surgery', 'case_id');
    }
}
