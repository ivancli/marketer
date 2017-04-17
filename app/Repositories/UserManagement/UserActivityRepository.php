<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 10:52 PM
 */

namespace App\Repositories\UserManagement;


use App\Contracts\UserManagement\UserActivityContract;
use App\Models\User;
use App\Models\UserActivity;
use Exception;
use Illuminate\Support\Facades\DB;

class UserActivityRepository implements UserActivityContract
{
    protected $userActivityModel;
    protected $db;

    public function __construct(UserActivity $userActivity, DB $db)
    {
        $this->userActivityModel = $userActivity;
        $this->db = $db;
    }

    /**
     * get all user activities (by filters)
     * @param array $data
     * @return mixed
     */
    public function all(array $data = [])
    {
        return $this->userActivityModel->all();
    }

    /**
     * get user activity by activity id
     * @param $id
     * @param bool $throw
     * @return mixed
     */
    public function get($id, $throw = true)
    {
        if ($throw) {
            return $this->userActivityModel->findOrFail($id);
        } else {
            return $this->userActivityModel->find($id);
        }
    }

    /**
     * create new user activity
     * @param array $data
     * @return UserActivity
     */
    public function store(array $data)
    {
        $userActivity = $this->userActivityModel->create($data);
        return $userActivity;
    }

    /**
     * attach activity to a user
     * @param UserActivity $userActivity
     * @param User $user
     * @return mixed
     */
    public function attachUser(UserActivity $userActivity, User $user)
    {
        return $user->activities()->save($userActivity);
    }
}