<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id', 'file_name', 'file', 'user_id',
    ];

    public static function table()
    {
        return 'patient_files';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
}
