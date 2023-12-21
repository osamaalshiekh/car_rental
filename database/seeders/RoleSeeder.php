<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $moderatorRole = Role::create(['name' => 'Moderator']);
        $userRole = Role::create(['name' => 'User']);

        $adminUser = User::create([
            'name' => 'Hi',
            'email' => '1@1.com',
            'password' => bcrypt('password'),
        ]);

        $moderatorUser = User::create([
            'name' => 'Moderator',
            'email' => '2@2.com',
            'password' => bcrypt('password'),
        ]);

        $userUser = User::create([
            'name' => 'User',
            'email' => '3@3.com',
            'password' => bcrypt('password'),
        ]);

        $adminUser->roles()->attach($adminRole);
        $moderatorUser->roles()->attach($moderatorRole);
        $userUser->roles()->attach($userRole);
    }
}
