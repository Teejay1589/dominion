<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'user_id', 'patient_id', 'visit_id', 'surgery_id', 'billing_name', 'amount', 'discount', 'total', 'is_paid',
        'user_id', 'visit_id', 'billing_name', 'amount', 'discount', 'total', 'is_paid',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public static function table()
    {
        return 'billings';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // public function patient()
    // {
    //     return $this->belongsTo('App\Visit', 'patient_id');
    // }

    public function visit()
    {
        return $this->belongsTo('App\Visit', 'visit_id');
    }

    // public function surgery()
    // {
    //     return $this->belongsTo('App\Surgery', 'surgery_id');
    // }

    public function patient()
    {
        return $this->visit->patient;
    }
}
