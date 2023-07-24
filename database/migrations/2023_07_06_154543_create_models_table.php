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
        Schema::create('mark_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api_id')->unique();
            $table->string('mark_api_id');
            $table->foreign('mark_api_id')->references('api_id')->on('marks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mark_models');
    }
};
