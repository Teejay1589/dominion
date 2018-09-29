<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

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

    // public function hospital_logo_thumb()
    // {
    //     // get a default image for hospital logo
    //     if ( $this->hospital_logo == 'img/default.png' ) {
    //         return 'img/default.png';
    //     } else {
    //         if ( !file_exists(str_ireplace('uploads/logo/', 'uploads/logo/thumbs/', $this->hospital_logo)) && file_exists($this->hospital_logo) ) {
    //             // generate thumb
    //             Image::configure(array('driver' => 'gd'));
    //             Image::make($this->hospital_logo)->fit(200, 200)->save(str_ireplace('uploads/logo/', 'uploads/logo/thumbs/', $this->hospital_logo));
    //         }

    //         return str_ireplace('uploads/logo/', 'uploads/logo/thumbs/', $this->hospital_logo);
    //     }
    // }
}
