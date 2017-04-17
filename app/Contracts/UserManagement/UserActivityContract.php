<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 10:49 PM
 */

namespace App\Contracts\UserManagement;


use App\Models\User;
use App\Models\UserActivity;

interface UserActivityContract
{
    /**
     * get all user activities (by filters)
     * @param array $data
     * @return mixed
     */
    public function all(array $data = []);

    /**
     * get user activity by activity id
     * @param $id
     * @param bool $throw
     * @return mixed
     */
    public function get($id, $throw = true);

    /**
     * create new user activity
     * @param array $data
     * @return UserActivity
     */
    public function store(array $data);

    /**
     * attach activity to a user
     * @param UserActivity $userActivity
     * @param User $user
     * @return mixed
     */
    public function attachUser(UserActivity $userActivity, User $user);
}