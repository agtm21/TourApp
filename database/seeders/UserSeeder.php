<?php

namespace Database\Seeders;

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
        $user = [
            [
                'username' => 'admin',
                'email'  => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
            [
                'username' => 'traveler123',
                'email'  => 'traveler@gmail.com',
                'password' => bcrypt('traveler'),
                'role' => 'traveler'
            ],
            [
                'username' => 'nelayan123',
                'email'  => 'nelayan@gmail.com',
                'password' => bcrypt('nelayan123'),
                'role' => 'nelayan'
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
