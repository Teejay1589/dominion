<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'user_id',
    ];

    public function table()
    {
        return $this->table;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
