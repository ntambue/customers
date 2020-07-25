<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Z.7ogYrSpCLabL1yAznSLuwvCyr76F/GA29MX4iyCedg0zVRFWi32',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
