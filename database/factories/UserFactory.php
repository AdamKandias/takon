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
        $randomPoint = fake()->numberBetween(50, 1000);
        $randomRole = 1;

        if ($randomPoint >= 800) {
            $randomRole = 8;
        } elseif ($randomPoint >= 650) {
            $randomRole = 7;
        } elseif ($randomPoint >= 500) {
            $randomRole = 6;
        } elseif ($randomPoint >= 400) {
            $randomRole = 5;
        } elseif ($randomPoint >= 300) {
            $randomRole = 4;
        } elseif ($randomPoint >= 200) {
            $randomRole = 3;
        } elseif ($randomPoint >= 100) {
            $randomRole = 2;
        } else {
            $randomRole = 1;
        }

        return [
            'name' => fake()->name(),
            'nisn' => fake()->unique()->numberBetween(0000000001, 9999999999),
            'birthdate' => fake()->date(),
            'point' => $randomPoint,
            'image' => "user-image/avatar" . fake()->numberBetween(1, 3) . ".png",
            'status_id' => 1,
            'role_id' => $randomRole,
            'class_id' => fake()->numberBetween(1, 60)
        ];
    }
}
