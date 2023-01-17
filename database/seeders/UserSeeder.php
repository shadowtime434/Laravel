<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'RIANdi',
            'user_name' => 'RINNN',
            'email' => 'muhamad@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin'
        ]);
    }
}
