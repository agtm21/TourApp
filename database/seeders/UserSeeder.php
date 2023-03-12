<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

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
                'email'  => 'dolphintour01@gmail.com',
                'password' => bcrypt('admin123'),

                'role' => 'admin'
            ],
            [
                'uuid' => '411b03c9-7013-4078-ae2b-21cbba1a67ff',
                'username' => 'wisatawan1',
                'email'  => 'wisatawan01@gmail.com',
                'password' => bcrypt('wisatawan1'),
                'role' => 'traveler',


            ],
            [
                'uuid' => 'bd305c8c-f1e0-40ba-a5f9-1318d7277271',
                'username' => 'wisatawan2',
                'email'  => 'wisatawan2@gmail.com',
                'password' => bcrypt('wisatawan2'),
                'role' => 'traveler',


            ],
            //nelayan




            [ //1
                'uuid' => 'f7312208-8bff-492e-86f8-98e7dd6f1881',
                'username' => 'gedesumanada',
                'email'  => 'gedesumadana01@gmail.com',
                'password' => bcrypt('gedesumanada'),
                'phone' => '082686090018',
                'role' => 'nelayan'
            ],
            [ //2
                'uuid' => 'da3acd3d-9dad-44bb-8a77-e23f98906122',
                'username' => 'gedekusumajaya',
                'email'  => 'gedekusumajaya02@gmail.com',
                'password' => bcrypt('gedekusumajaya'),
                'phone' => '089145167129',
                'role' => 'nelayan'
            ],
            [ //3
                'uuid' => '076c5f81-f107-4aa6-b9bd-906539eb6017',
                'username' => ' putuwidiarsana',
                'email'  => 'putuwidiarsana03@gmail.com',
                'password' => bcrypt('putuwidiarsana'),
                'phone' => '087099997658',
                'role' => 'nelayan'
            ],
            [ //4
                'uuid' => 'dc922d05-b0cb-43f8-9a14-de7ed3bc633c',
                'username' => 'gedemangku',
                'email'  => 'gedemangku0004@gmail.com',
                'password' => bcrypt('gedemangku'),
                'phone' => '080240012144',
                'role' => 'nelayan'
            ],
            [ //5
                'uuid' => '5b5d4c5a-4276-4f2e-8eea-0f021396cfc4',
                'username' => 'nyomancenik',
                'email'  => 'ceniknyoman74@gmail.com',
                'password' => bcrypt('nyomancenik'),
                'phone' => '086043017495',
                'role' => 'nelayan'
            ],
            [ //6
                'uuid' => 'f5464ad9-61f4-47f2-a601-5e1a1c6eb4e4',
                'username' => 'putunurada',
                'email'  => 'putunurada06@gmail.com',
                'password' => bcrypt('putunurada'),
                'phone' => '081303587846',
                'role' => 'nelayan'
            ],
            [ //7
                'uuid' => 'a279c401-8b90-426e-99aa-347a8bbf3444',
                'username' => 'ketutsumendre',
                'email'  => 'ketutsumendra07@gmail.com',
                'password' => bcrypt('ketutsumendre'),
                'phone' => '080299584484',
                'role' => 'nelayan'
            ],
            [ //8
                'uuid' => 'e5c0be2f-6e65-426e-b029-a1a7e0aff0bf',
                'username' => 'kadekwidiada',
                'email'  => 'kadekwidiadi08@gmail.com',
                'password' => bcrypt('kadekwidiada'),
                'phone' => '081556105873',
                'role' => 'nelayan'
            ],
            [ //9
                'uuid' => 'ccf75287-2f0d-4f96-bbdf-b3d247f12c44',
                'username' => 'kadekwijaya',
                'email'  => 'kadekwijhaya09@gmail.com',
                'password' => bcrypt('kadekwijaya'),
                'phone' => '082235616264',
                'role' => 'nelayan'
            ],
            [ //10
                'uuid' => '38544ca6-7cfd-420f-96f3-8a0978f44668',
                'username' => 'kadekbudiarsana',
                'email'  => 'kadekbudhiarsana10@gmail.com',
                'password' => bcrypt('kadekbudiarsana'),
                'phone' => '081901773349',
                'role' => 'nelayan'
            ],
            [ //11
                'uuid' => '08596423-6ef9-4beb-b1a4-7bddd3182701',
                'username' => 'gedesuardana',
                'email'  => 'gedesuardana@gmail.com',
                'password' => bcrypt('gedesuardana'),
                'phone' => '089016032333',
                'role' => 'nelayan'
            ],
            [ //12
                'uuid' => '5d3507f0-6d45-41e2-ad46-a69a45ca732c',
                'username' => 'komangpasek',
                'email'  => 'komangpasek@gmail.com',
                'password' => bcrypt('komangpasek'),
                'phone' => '089619741256',
                'role' => 'nelayan'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
