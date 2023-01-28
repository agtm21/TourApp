<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
                'uuid' => '2fadbd8a-6c71-4f26-9768-475021a2d417',
                'username' => 'admin',
                'email'  => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
            [
                'uuid' => '411b03c9-7013-4078-ae2b-21cbba1a67ff',
                'username' => 'traveler123',
                'email'  => 'traveler@gmail.com',
                'password' => bcrypt('traveler'),
                'role' => 'traveler',
                'currency' => '100000'
            ],
            [
                'uuid' => 'f7312208-8bff-492e-86f8-98e7dd6f1881',
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
