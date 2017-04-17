<?php

use App\Contracts\UserManagement\RoleContract;
use App\Models\User;
use Illuminate\Database\Seeder;

class InitAdminSeeder extends Seeder
{
    protected $roleRepo;

    public function __construct(RoleContract $roleContract)
    {
        $this->roleRepo = $roleContract;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->first_name = 'Ivan';
        $admin->last_name = 'Li';
        $admin->email = 'ivan.li@hotmail.com';
        $admin->password = bcrypt('secret');
        $admin->save();

        $tier_1 = $this->roleRepo->get(1);
        $this->roleRepo->attachUser($tier_1, $admin);
    }
}
