<?php

namespace Database\Factories;

use App\Models\User;
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
            'product_name' => $this->faker->words(3,true),
            'description' => $this->faker->text(100),
            'price' => random_int(1000, 10000),
            'img' => $this->faker->imageUrl(),
            'user_id' => User::get()->random()->id,
        ];
    }
}
