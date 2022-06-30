<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Public\CarController as PublicCarController;
use App\Http\Controllers\Public\CategoryController as PublicCategoryController;
use Illuminate\Support\Facades\App;
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

Route::prefix('{locale?}')->middleware('lang')->group(function () {
    Route::get('/', [HomeController::class, 'welcome'])->name('home');
    Route::view('/about', 'pages.about')->name('about');
    Route::view('/contact-us', 'pages.contact')->name('contact');

    Route::get('/', [HomeController::class, 'welcome'])->name('home');

    Route::view('/about', 'pages.about')->name('about');
    Route::view('/contact-us', 'pages.contact')->name('contact');

    Route::post('/contact-us', [MessageController::class, 'store'])->name('messages.store');
    Route::resource('cars', PublicCarController::class);
    Route::get('categories', [PublicCategoryController::class, 'index'])->name('categories.index');
    // Auth routes
    Route::get('login', [LoginController::class, 'show'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'authenticate'])->middleware('guest');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'show'])->middleware('guest')->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.request');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.change');

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::resource('cars', CarController::class);
        Route::resource('categories', CategoryController::class);

        Route::resource('colors', ColorController::class);

        Route::resource('users', UserController::class)->middleware('is_admin');
        Route::resource('media', MediaController::class)->only('destroy');
    });
});

Route::get('/language/{lang}', function ($lang) {
    session(['lang' => $lang]);
    App::setLocale($lang);

    $previous_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    return redirect()->route($previous_route, $lang);
})->name('locale.update');
