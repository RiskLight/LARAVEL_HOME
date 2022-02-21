<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\GenresController;
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
//Route::get('/admin', [FilmsController::class, 'adminIndex'])->middleware(\App\Http\Middleware\Admin::class);
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
//    'middleware' => 'admin'
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
        Route::put('/comments/{comment}', [CommentsController::class, 'update'])->name('publish');
        Route::delete('/comments/destroy/{comment}', [CommentsController::class, 'destroy'])->name('destroy');
    });
});

Route::group([
    'as' => 'films.',
    'prefix' => 'films'
], function () {
    Route::get('/{standartId?}/{genreId?}', [FilmsController::class, 'index'])->name('site');
    Route::get('/{film}/show/film', [FilmsController::class, 'show'])->name('show');
});


Route::group([
    'as' => 'genres.',
    'prefix' => 'genres'
], function () {
    Route::get('/', [GenresController::class, 'index'])->name('genres');
});

Route::group([
    'as' => 'favorites.',
    'prefix' => 'favorites'
], function () {
    Route::get('/favorite', [FilmsController::class, 'getFav'])->name('favorite');
});

Route::group([
    'as' => 'comments.',
    'prefix' => 'comments'
], function () {
    Route::post('/', [CommentsController::class, 'store'])->name('store');
    Route::get('/{film}', [CommentsController::class, 'show'])->name('show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
