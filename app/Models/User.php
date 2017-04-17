<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use IvanCLI\UM\Traits\UMUserTrait;

class User extends Authenticatable
{
    use Notifiable, UMUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    protected $appends = [
        'fullName'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    #region relationships

    public function activities()
    {
        return $this->hasMany('App\Models\UserActivity', 'user_id', 'id');
    }

    public function preferences()
    {
        return $this->hasMany('App\Models\UserPreference', 'user_id', 'id');
    }

    #endregion

    #region attributes

    /**
     * get user full name
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    #endregion
}
