<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('fitness_plan_results', function (Blueprint $table) {
            $table->longText('processed_response')->nullable()->after('ai_response');
        });
    }

    public function down()
    {
        Schema::table('fitness_plan_results', function (Blueprint $table) {
            $table->dropColumn('processed_response');
        });
    }
};
