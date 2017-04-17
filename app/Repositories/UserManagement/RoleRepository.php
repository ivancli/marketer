<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 18/04/2017
 * Time: 12:08 AM
 */

namespace App\Repositories\UserManagement;


use App\Contracts\UserManagement\RoleContract;
use App\Models\Role;
use App\Models\User;

class RoleRepository implements RoleContract
{
    protected $roleModel;

    public function __construct(Role $role)
    {
        $this->roleModel = $role;
    }

    /**
     * get all roles (by filter)
     * @param array $data
     * @return mixed
     */
    public function all(array $data = [])
    {
        // TODO: Implement all() method.
    }

    /**
     * get role by id
     * @param $id
     * @param bool $throw
     * @return mixed
     */
    public function get($id, $throw = true)
    {
        if ($throw) {
            return $this->roleModel->findOrFail($id);
        } else {
            return $this->roleModel->find($id);
        }
    }

    /**
     * create a new role
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    /**
     * Attach a role to a user
     * @param Role $role
     * @param User $user
     * @return mixed
     */
    public function attachUser(Role $role, User $user)
    {
        $user->attachRole($role);
    }
}