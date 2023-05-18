<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tip>
 */
class TipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentences(1, true),
            'body' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'user_id' => User::query()->inRandomOrder()->value('id'),
        ];
    }
}
