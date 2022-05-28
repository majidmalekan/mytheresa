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
            'name' => $this->faker->name,
            'category' => $this->faker->randomElement(['boots', 'sandals', 'sneakers', 't-shirt','purse']),
            'sku' => '00000' . $this->faker->randomDigit(),
            'price' => $this->faker->numberBetween($min = 1000, $max = 100000)
        ];
    }
}
