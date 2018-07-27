<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitDoctors extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'visit_id', 'doctor_id',
    ];

    public static function table()
    {
        return 'visit_doctors';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function visit()
    {
        return $this->belongsTo('App\Cases', 'visit_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }
}
