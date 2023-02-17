<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'question' => fake()->sentence(rand(3,40)),
            'mapel_id' => fake()->numberBetween(1, 8),
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
