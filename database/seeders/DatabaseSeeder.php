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
        User::factory(30)
            ->has(Recipe::factory(10)->has(Category::factory(1)))
            ->has(Tip::factory(2))
            ->has(Comment::factory(5))
            ->create();

        Ingredient::factory(100)->create();
        Tag::factory(25)->create();
        Emoji::factory(10)->create();
    }
}
