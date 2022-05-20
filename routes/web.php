<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'welcome'])->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact-us', 'pages.contact')->name('contact');

Route::post('/contact-us', [MessageController::class, 'store'])->name('messages.store');


Route::get('/admin/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/admin/messages/{message}', [MessageController::class, 'show'])->name('messages.show');

Route::get('/admin/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/admin/cars/{car}', [CarController::class, 'show'])->name('cars.show');
Route::get('/admin/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/admin/cars', [CarController::class, 'store'])->name('cars.store');
