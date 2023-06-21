<?php

use App\Models\User;
use App\Models\Movie;
use App\Models\Prompt;
use App\Models\Emotion;
use App\Enums\CountryEnum;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Enum;
use GraphQL\Type\Definition\ObjectType;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/test', function() {

    dd(collect(CountryEnum::cases()), collect(CountryEnum::cases())->pluck('value', 'name'));
    return '';
});
