<?php

use App\Enums\CountryEnum;
use App\Enums\GenderEnum;
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
        // dd(array_column(CountryEnum::cases(), 'name'));
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('country', array_column(CountryEnum::cases(), 'value'));
            $table->enum('gender', array_column(GenderEnum::cases(), 'value'))->nullable();
            $table->string('description')->nullable();
            $table->string('email')->unique();
            $table->json('wanted_genres')->nullable();
            $table->json('unwanted_genres')->nullable();
            $table->json('rent')->nullable();
            $table->json('buy')->nullable();
            $table->json('flatrate')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
