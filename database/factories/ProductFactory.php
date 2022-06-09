<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'product_name' => $this->faker->sentence(),
            'reference' => $this->faker->bothify('???###'),
            'price' => $this->faker->randomFloat(2,  $min = 100000, $max = 1000000),
            'weight' => $this->faker->randomFloat(2,  $min = 1, $max = 3),  
            'category' => category::all()->random()->id,
            'stock' => $this->faker->randomDigitNot(0),
            'creation_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user' => User::all()->random()->id,
        ];
    }
}
