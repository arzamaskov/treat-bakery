<?php

namespace Database\Factories;

use App\Models\{Recipe, Tip, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $owner = $this->owner();

        return [
            'parent_id' => null,
            'body' => fake()->sentence(),
            'owner_id' => $owner::factory()->create(),
            'owner_type' => $owner,
        ];
    }

    private function owner(): string
    {
        return fake()->randomElement([User::class, Recipe::class, Tip::class]);
    }
}
