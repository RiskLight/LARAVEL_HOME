<?php

use App\Http\Controllers\Auth\ActivateController;
use App\Http\Controllers\Auth\ActivationResendController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FilmsController::class, 'index']);
Route::get('/admin', [FilmsController::class, 'adminIndex'])->middleware(\App\Http\Middleware\Admin::class);
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => 'admin'
], function () {
    Route::group([
        'as' => 'films.',
        'prefix' => 'films'
    ], function () {
        Route::get('/', [FilmsController::class, 'adminIndex'])->name('index');
        Route::get('/create', [FilmsController::class, 'create'])->name('create');
        Route::post('/', [FilmsController::class, 'store'])->name('store');
        Route::get('/{film}/edit', [FilmsController::class, 'edit'])->name('edit');
        Route::put('/update/{film}', [FilmsController::class, 'update'])->name('update');
        Route::delete('/destroy/{film}', [FilmsController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as' => 'users.',
        'prefix' => 'users'
    ], function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/', [UsersController::class, 'store'])->name('store');
        Route::get('/{user}', [UsersController::class, 'show'])->name('show');
        Route::get('/change/{user}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UsersController::class, 'update'])->name('update');
        Route::delete('/destroy/user/{user}', [UsersController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as' => 'comments.',
        'prefix' => 'comments'
    ], function () {
        Route::get('/', [CommentsController::class, 'index'])->name('index');
        Route::put('{film}/comments/{comment}', [CommentsController::class, 'update'])->name('update');
        Route::delete('/destroy/{comment}', [CommentsController::class, 'destroy'])->name('destroy');
    });

    Route::get('/search', [FilmsController::class, 'adminSearch'])->name('search');

});

Route::group([
    'as' => 'films.',
    'prefix' => 'films'
], function () {

    Route::group([
        'as' => 'content.',
        'prefix' => 'content'
    ], function () {
        Route::get('/{standartId?}/{genreId?}', [FilmsController::class, 'index'])->name('site');
        Route::get('/{film}/show/film', [FilmsController::class, 'show'])->name('show');
    });

    Route::group([
        'as' => 'comments.',
        'prefix' => '{film}/comments',

    ], function () {
        Route::post('/', [CommentsController::class, 'store'])->name('store');
        Route::put('/{comment}', [CommentsController::class, 'update'])->name('update');
    });

    Route::group([
        'as' => 'favorite.',
        'prefix' => 'favorite',
    ], function () {
        Route::get('/my-films', [FavoriteController::class, 'index'])->name('index');
        Route::post('/', [FavoriteController::class, 'store'])->name('store');
        Route::delete('/destroy/{film}', [FavoriteController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as' => 'rate.',
        'prefix' => 'rate'
    ], function () {
        Route::post('/', [RateController::class, 'store'])->name('store');
        Route::get('/get/{film}', [RateController::class, 'show'])->name('show');
    });

    Route::get('/search', [FilmsController::class, 'search'])->name('search');

});

Route::group([
    'as' => 'genres.',
    'prefix' => 'genres'
], function () {
    Route::get('/', [GenresController::class, 'index'])->name('genres');
});

Auth::routes();


Route::get('auth/activate', [ActivateController::class, 'activate'])->name('auth.activate');
Route::get('auth/activate/resend', [ActivationResendController::class, 'showResendForm'])->name('auth.activate.resend');
Route::post('auth/activate/resend', [ActivationResendController::class, 'resend']);

//Route::get('/search', [FilmsController::class, 'search'])->name('search');
//Route::group([
//    'as' => 'auth.',
//    'prefix' => 'auth'
//], function () {
//    Route::get('/activate', [ActivateController::class, 'activate'])->name('activate.resend');
//    Route::get('/activate/resend', [ActivationResendController::class, 'showResendForm'])->name('resend');
//    Route::post('/activate/resend', [ActivationResendController::class, 'resend'])->name('post');
//
//});

//Route::get('auth/activate', [ActivateController::class, 'activate'])->name('auth.activate');
//Route::get('auth/activate/resend', [ActivationResendController::class, 'showResendForm'])->name('auth.activate.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
