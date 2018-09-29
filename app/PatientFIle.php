<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function file_thumb()
    {
        if ( $this->file == 'img/default.png' || $this->file == '' || $this->file == null ) {
            return 'img/default.png';
        } else {
            if ( !file_exists(str_ireplace('uploads/patient_files/', 'uploads/patient_files/thumbs/', $this->file)) && file_exists($this->file) ) {
                // generate thumb
                Image::configure(array('driver' => 'gd'));
                Image::make($this->file)->fit(595, 842)->save(str_ireplace('uploads/patient_files/', 'uploads/patient_files/thumbs/', $this->file));
            }

            return str_ireplace('uploads/patient_files/', 'uploads/patient_files/thumbs/', $this->file);
        }
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
