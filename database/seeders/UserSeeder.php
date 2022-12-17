<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'name' => 'admins'
        ]);
        Role::insert([
            'name' => 'client'
        ]);
        User::insert([
            'name' => 'admin',
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'address' => 'admin',
            'role_id' => 1,
        ]);
        User::insert([
            'name' => 'Иванов Иван Иванович',
            'login' => 'user',
            'password' => Hash::make('1'),
            'address' => 'Энтузиастов 17',
        ]);
    }
}
