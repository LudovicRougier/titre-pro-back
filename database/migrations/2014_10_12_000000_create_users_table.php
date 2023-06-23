<?php

use App\Enums\GenderEnum;
use App\Enums\CountryEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('age');
            $table->longText('country');
            $table->longText('gender');
            $table->longText('description');
            $table->string('email')->unique();
            $table->longText('wanted_genres');
            $table->longText('unwanted_genres');
            $table->longText('wanted_watch_providers');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
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
