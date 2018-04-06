<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseDoctors extends Model
{
    protected $table = 'case_doctors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'case_id', 'doctor_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function case()
    {
        return $this->belongsTo('App\Cases', 'case_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }
}
