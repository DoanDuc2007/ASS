<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'category_id' => fake() -> randomElement([1,2,3,4]),
            'brand_id' => fake() -> randomElement([1,2,3,4]),
            'name' => fake() -> text(10),
            'describe' => fake() -> text(10),
            'price' => fake()->randomFloat(2, 10, 100),
            'img' => fake()->imageUrl,


        ];
    }
}
