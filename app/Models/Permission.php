<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 12:15 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use IvanCLI\UM\Traits\UMPermissionTrait;

class Permission extends Model
{
    use UMPermissionTrait;
}