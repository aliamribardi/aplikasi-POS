<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'AAB',
            'email' => 'aliamri@gmail.com',
            'password' => bcrypt('aliamrib'),
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);

        $user->assignRole('User');
    }
}
