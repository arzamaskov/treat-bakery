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
            'name' => ucfirst($this->faker->words(7, true)),
            'description' => $this->faker->sentences(),
            'image' => $this->faker->imageUrl(),
            'user_id' => User::query()->inRandomOrder()->value('id'),
        ];
    }
}
