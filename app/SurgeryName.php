<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgeryName extends Model
{
    protected $table = 'surgery_names';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surgery_name',
    ];
}
