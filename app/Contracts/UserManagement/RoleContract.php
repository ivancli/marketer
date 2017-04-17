<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 18/04/2017
 * Time: 12:07 AM
 */

namespace App\Contracts\UserManagement;


use App\Models\Role;
use App\Models\User;

interface RoleContract
{
    /**
     * get all roles (by filter)
     * @param array $data
     * @return mixed
     */
    public function all(array $data = []);

    /**
     * get role by id
     * @param $id
     * @param bool $throw
     * @return mixed
     */
    public function get($id, $throw = true);

    /**
     * create a new role
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * Attach a role to a user
     * @param Role $role
     * @param User $user
     * @return mixed
     */
    public function attachUser(Role $role, User $user);
}