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
        Schema::table('cars', function (Blueprint $table){
            $table->string('model_api_id')->nullable();
            $table->foreign('model_api_id')->references('api_id')->on('mark_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function(Blueprint $table){
            $table->dropColumn('model_api_id');
        });
    }
};
