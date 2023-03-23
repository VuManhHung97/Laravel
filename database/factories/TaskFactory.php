<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->text(),
            "description" => fake()->text(),
            "type" => fake()->numberBetween(0, 1),
            "status" => fake()->numberBetween(0, 1),
            "start_date" => fake()->date(),
            "assignee" => 13,
            "due_date" => fake()->date(),
            "estimate" => fake()->date(),
            "actual" => fake()->randomDigit(),
        ];
    }
}
