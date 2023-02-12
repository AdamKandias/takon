<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'nisn' => fake()->unique()->numberBetween(0000000001, 9999999999),
            'birthdate' => fake()->date(),
            'point' => fake()->numberBetween(50, 800),
            'image' => fake()->numberBetween(1, 3),
            'status_id' => 1,
            'role_id' => fake()->numberBetween(1, 8),
            'class_id' => fake()->numberBetween(1, 60)
        ];
    }
}
