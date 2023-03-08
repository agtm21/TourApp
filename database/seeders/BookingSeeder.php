<?php

namespace Database\Seeders;

use App\Models\booking;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $booking = [
            [
                'product_name' => 'Paket Small',
                'product_desc' => 'Dolphin Tour Selamat 45 menit + Life Jacket (Max 5 Orang) | FREE Coffe Break sebelum keberangkatan ( apabila kedatangan anda sebelum jam 05.30 )',
                'price' => '350000.00',
                'img_path' => 'img\small.jpeg',
                'place' => 'Lovina',
                'time' => '6:00',
                'date' => '2023-11-11'
            ],
            [
                'product_name' => 'Paket Medium',
                'product_desc' => 'Dolphin Tour selama 1 jam + Life Jacket + FREE roti untuk memberi makan ikan hias (Max 7 Orang) |FREE Coffe Break sebelum keberangkatan ( apabila kedatangan anda sebelum jam 05.30 )',
                'price' => '455000.00',
                'img_path' => 'img\medium.jpeg',
                'time' => '6:00',
                'place' => 'Lovina',
                'date' => '2023-11-11'
            ],
            [
                'product_name' => 'Paket Large',
                'product_desc' => 'Dolphin Tour selamat 1 jam + Life Jacket + Free roti untuk memberi makan ikan hias (Max 10 orang) | FREE Coffe Break sebelum keberangkatan ( apabila kedatangan anda sebelum jam 05.30 )',
                'price' => '500000.00',
                'img_path' => 'img\large.jpeg',
                'time' => '6:00',
                'place' => 'Lovina',
                'date' => '2023-11-11'
            ]
        ];
        foreach ($booking as $bk => $value) {
            booking::create($value);
        }
    }
}
