<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([2, 3, 4, 5, 6]),
            'name' => $this->faker->catchPhrase,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 100),
        ];
    }
}
