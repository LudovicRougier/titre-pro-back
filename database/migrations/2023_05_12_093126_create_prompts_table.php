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
            $table->longText('user_input');
            $table->longText('custom_answer');
            $table->longText('is_positive');
            $table->longText('language');
            $table->longText('main_emotion_translation');
            $table->longText('sub_emotion_translation');
            $table->longText('movies_related_to_emotions');
            $table->longText('movies_related_to_topic');
            $table->dateTime('deleted_at')->nullable();
            $table->longText('main_emotion_id');
            $table->longText('sub_emotion_id');

            $table->timestamps();
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
