<?php

use App\Models\Emoji;
use App\Models\Recipe;
use App\Models\Tip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emoji', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('emoji_recipe', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Emoji::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(Recipe::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::create('emoji_tip', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Emoji::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(Tip::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('emoji_recipe');
            Schema::dropIfExists('emoji_tip');
            Schema::dropIfExists('tags');
        }
    }
};
