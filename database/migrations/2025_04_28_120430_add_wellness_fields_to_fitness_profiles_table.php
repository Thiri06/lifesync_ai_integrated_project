<?php

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
        Schema::table('fitness_profiles', function (Blueprint $table) {
            $table->string('nutrition_goal')->nullable();
            $table->string('foods_to_avoid')->nullable();
            $table->string('mental_goal')->nullable();
            $table->string('stress_level')->nullable();
            $table->string('sleep_quality')->nullable();
            $table->json('wellness_methods')->nullable(); // Store multiple wellness methods
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fitness_profiles', function (Blueprint $table) {
            //
        });
    }
};
