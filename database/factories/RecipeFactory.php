<?php

namespace Database\Factories;

use App\Models\{Category, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
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
            'body' => fake()->paragraphs(2, true),
            'image' => fake()->imageUrl(),
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
        ];
    }
}
