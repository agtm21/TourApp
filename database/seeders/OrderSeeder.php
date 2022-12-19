<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Decimal;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('supply')->insert([
            'name_order' => Str::random(5),
            'price_order' => 75000,
            'description' => Str::random(20)
        ]);
    }
}
