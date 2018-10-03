<?php

namespace App;

use App\Permission;
use App\UserPermission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Intervention\Image\ImageManagerStatic as Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id', 'gender', 'phone', 'date_of_birth', 'address', 'country', 'state', 'job', 'profile_picture', 'cv',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_permitted_to($action, $table)
    {
        $permission = Permission::where('action', $action)
            ->where('table', $table)
            ->first();
        $user_permission = UserPermission::where('action', $action)
            ->where('table', $table)
            ->where('user_id', $this->id)
            ->first();
        return ((isset($permission->permit) && $permission->permit >= $this->role_id) || isset($user_permission));
    }

    public static function table()
    {
        return 'users';
    }

    public function profile_picture_thumb()
    {
        if ( $this->profile_picture == 'img/default.png' ) {
            return 'img/default.png';
        } else {
            if ( !file_exists(str_ireplace('uploads/mpp/', 'uploads/mpp/thumbs/', $this->profile_picture)) && file_exists($this->profile_picture) ) {
                // generate thumb
                Image::configure(array('driver' => 'gd'));
                Image::make($this->profile_picture)->fit(200, 200)->save(str_ireplace('uploads/mpp/', 'uploads/mpp/thumbs/', $this->profile_picture));
            }

            return str_ireplace('uploads/mpp/', 'uploads/mpp/thumbs/', $this->profile_picture);
        }
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function visits()
    {
        return $this->hasMany('App\Visit');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Surgery');
    }

    public function billings()
    {
        return $this->hasMany('App\Billing');
    }

    public function sms()
    {
        return $this->hasMany('App\Sms', 'user_id');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder', 'user_id');
    }

    public function undone_reminders()
    {
        return $this->reminders->where('done', 0);
    }
}
