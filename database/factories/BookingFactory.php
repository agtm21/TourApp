<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => 'Lorem Ipsum',
            'product_desc' => $this->faker->sentence(7),
            'price' => $this->faker->randomNumber(5, True),
            'img_path' => $this->faker->imageUrl(680, 480, 'ships', true),
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
        ];
    }
}
