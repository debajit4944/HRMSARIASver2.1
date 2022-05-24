<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Call the UserFactory
        \App\Models\User::factory(10)->create();
        //Call the UserInfoFactory
        \App\Models\UserInfo::factory(5)->create();
        //Call the DistrictSeeder
        $this->call(DistrictSeeder::class);
        //Call the DesignationSeeder
        $this->call(DesignationSeeder::class);
        //Call the ProjectSeeder
        $this->call(ProjectSeeder::class);
        //Call the OrganizationSeeder
        $this->call(OrganizationSeeder::class);
    }
}
