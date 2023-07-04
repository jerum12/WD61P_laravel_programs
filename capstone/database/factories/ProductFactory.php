<?php

namespace Database\Factories;

use App\Models\Product;
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

     protected $model = Product::class;

    public function definition(): array
    {
        return [
            //
            'product_name' => $this->faker->name(),
            'product_description' => $this->faker->text(),
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
