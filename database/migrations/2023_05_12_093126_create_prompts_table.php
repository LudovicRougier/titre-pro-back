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
            $table->text('custom_answer');
            $table->boolean('is_positive')->nullable();
            $table->string('language');
            $table->string('main_emotion_translation');
            $table->string('sub_emotion_translation');
            $table->json('movies_related_to_emotions')->nullable();
            $table->json('movies_related_to_topic')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('main_emotion_id')->nullable();
            $table->unsignedBigInteger('sub_emotion_id')->nullable();

            $table->foreign('main_emotion_id')->references('id')->on('emotions');
            $table->foreign('sub_emotion_id')->references('id')->on('emotions');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
