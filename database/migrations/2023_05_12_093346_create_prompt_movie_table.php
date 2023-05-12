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
        Schema::create('prompt_movie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();

            $table->foreignId('prompt_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompt_movie');
    }
};
