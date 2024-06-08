<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\models\User;
use App\models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'id' => 1,
            'name' => 'Admin',
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Manajer',
        ]);
        Role::create([
            'id' => 3,
            'name' => 'Finance',
        ]);
        Role::create([
            'id' => 4,
            'name' => 'Office',
        ]);
        User::create([
            'fullname' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'roleId' => 1,
        ]);
        User::create([
            'fullname' => 'Manager',
            'username' => 'manager',
            'password' => Hash::make('manager'),
            'roleId' => 2,
        ]);
        User::create([
            'fullname' => 'Finance',
            'username' => 'finance',
            'password' => Hash::make('finance'),
            'roleId' => 3,
        ]);
        User::create([
            'fullname' => 'Office',
            'username' => 'office',
            'password' => Hash::make('office'),
            'roleId' => 4,
        ]);
    }
}
