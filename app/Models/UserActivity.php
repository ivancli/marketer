<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 10:37 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $fillable = [
        'module', 'action'
    ];

    #region relationships

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    #endregion
}