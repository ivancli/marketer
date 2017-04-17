<?php

use Illuminate\Database\Seeder;

class AppInitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitRolesSeeder::class);
        $this->call(InitAdminSeeder::class);
    }
}
