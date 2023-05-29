<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\{Category, Emoji, Ingredient, Recipe, Tag, Tip, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(20)->create();
        Ingredient::factory(100)->create();
        Tag::factory(25)->create();
        Emoji::factory(10)->create();

        User::factory(30)
            ->has(Recipe::factory()->count(5))
            ->has(Tip::factory()->count(2))
            ->has(Comment::factory()->count(3))
            ->create();
    }
}
