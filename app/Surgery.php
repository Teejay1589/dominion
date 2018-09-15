<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'visit_id', 'surgery_id', 'surgery_name', 'surgery_date', 'complications',
    ];

    public static function table()
    {
        return 'surgeries';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function visit()
    {
        return $this->belongsTo('App\Visit', 'visit_id');
    }

    public function surgery()
    {
        return $this->belongsTo('App\Surgery');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Surgery');
    }

    public function patient()
    {
        return $this->visit->patient;
    }
}