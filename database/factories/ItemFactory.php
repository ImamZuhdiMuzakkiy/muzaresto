<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1000, 100000),
            'category_id' => $this->faker->numberBetween(1, 2),
            'image' => fake()->randomElement(['https://images.unsplash.com/photo-1565299624946-b28f40a0ae38', 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c', 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601']),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
