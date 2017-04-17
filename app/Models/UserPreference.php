<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 2:04 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $fillable = [
        'element', 'value'
    ];

    #region relationships

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    #endregion
}