<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone_number', 'email', 'sex', 'marital_status', 'date_of_birth', 'religion', 'address', 'nationality', 'state_of_origin', 'LGA', 'occupation', 'office_address', 'next_of_kin_name', 'next_of_kin_relationship', 'next_of_kin_address', 'next_of_kin_phone_number', 'blood_group', 'weight', 'height', 'genotype',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function table()
    {
        return 'patients';
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function visits()
    {
        return $this->hasMany('App\Visit', 'patient_id');
    }

    public function surgeries()
    {
        return $this->visits->reject(function ($value, $key) {
            return $value->surgeries->count() == 0;
        })->pipe(function ($filtered) {
            return $filtered->pluck('surgeries');
        })->flatten();
    }

    public function billings()
    {
        return $this->visits->pipe(function ($filtered) {
            return $filtered->pluck('billings');
        })->flatten();
    }
}
