<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgeryName extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surgery_name', 'description',
    ];

    public static function table()
    {
        return 'surgery_names';
    }
}
