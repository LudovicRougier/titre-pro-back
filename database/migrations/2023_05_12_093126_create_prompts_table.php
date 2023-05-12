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
        Schema::create('prompts', function (Blueprint $table) {
            $table->id();
            $table->string('user_input');
            $table->string('custom_answer');
            $table->boolean('is_positive');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('main_emotion_id')->nullable();
            $table->unsignedBigInteger('sub_emotion_id')->nullable();


            $table->foreign('main_emotion_id')->references('id')->on('emotions');
            $table->foreign('sub_emotion_id')->references('id')->on('emotions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_prompts');
    }
};
