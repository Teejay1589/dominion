<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    protected $table = 'surgeries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'case_id', 'surgery_id', 'name', 'surgery_date', 'complications',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function case()
    {
        return $this->belongsTo('App\Cases', 'case_id');
    }

    public function surgery()
    {
        return $this->belongsTo('App\Surgery');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Surgery');
    }
}