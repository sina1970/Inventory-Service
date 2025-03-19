<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => fake()->word(), // Generate a random product name
            'sku' => 'PROD-' . strtoupper(fake()->unique()->bothify('???-###')), // Custom SKU format
            'price' => fake()->randomFloat(2, 10, 5000), // Price between 10 and 5000
        ];
    }
}
