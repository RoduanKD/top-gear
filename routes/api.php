<?php

use App\Events\MessageReceived;
use App\Http\Controllers\Api\V1\CarController;
use App\Http\Controllers\Api\V1\MessageController;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/hello', function () {
    return [
        'name' => 'fathi',
        'lname' => 'abo alftouh',
        'message' => 'hello there!',
    ];
});

Route::post('/contact', [MessageController::class, 'store']);

Route::apiResource('cars', CarController::class)->only(['index', 'show']);


Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $token = $request->user()->createToken('auth');

        return ['token' => $token->plainTextToken];
    }
});
