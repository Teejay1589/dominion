<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospital_logo', 'hospital_name', 'hospital_tagline', 'hospital_address', 'hospital_phone', 'hospital_email', 'sms_username', 'sms_password', 'sms_from'
    ];

    public static function table()
    {
        return 'settings';
    }
}
