<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Public\CarController as PublicCarController;
use App\Http\Controllers\Public\CategoryController as PublicCategoryController;
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

Route::get('/', [HomeController::class, 'welcome'])->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact-us', 'pages.contact')->name('contact');

Route::post('/contact-us', [MessageController::class, 'store'])->name('messages.store');
Route::resource('cars', PublicCarController::class);
Route::get('categories', [PublicCategoryController::class, 'index'])->name('categories.index');

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    Route::resource('cars', CarController::class);
    Route::resource('categories', CategoryController::class);
});
