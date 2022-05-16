<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(800, 600),
            'type' => $this->faker->randomElement(['home', 'popup']),
            'start_date' => $this->faker->dateTimeBetween('-2 week', '-1 week'),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+2 week'),
        ];
    }
}
