<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Teller',
                'email' => 'admin@onlinewebtutorblog.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@onlinewebtutorblog.com',
                'is_admin' => '3',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'normal@onlinewebtutorblog.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Manager',
                'email' => 'normal@onlinewebtutorblog.com',
                'is_admin' => '2',
                'password' => bcrypt('123456'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}