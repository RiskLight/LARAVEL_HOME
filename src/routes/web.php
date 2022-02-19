<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\UsersController;
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

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/'
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
        Route::post('/change/{user}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UsersController::class, 'update'])->name('edit');
        Route::delete('/{user}', [UsersController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as' => 'comments.',
        'prefix' => 'comments'
    ], function () {
        Route::get('/', [CommentsController::class, 'index'])->name('index');
        Route::put('/{comment}', [CommentsController::class, 'update'])->name('publish');
        Route::delete('/{comment}', [CommentsController::class, 'destroy'])->name('destroy');
    });
});

Route::group([
    'as' => 'films.',
    'prefix' => 'films'
], function () {
    Route::get('/{standartId?}/{genreId?}', [FilmsController::class, 'index'])->name('site');
    Route::get('/{film}/show/film', [FilmsController::class, 'show'])->name('show');
    Route::get('/{user}/favorite', [FilmsController::class, 'indexFavorite'])->name('favorite');

});

Route::group([
    'as' => 'genres.',
    'prefix' => 'genres'
], function () {
    Route::get('/', [GenresController::class, 'index'])->name('genres');
});

Route::group([
    'as' => 'comments.',
    'prefix' => 'comments'
], function () {
    Route::post('/', [CommentsController::class, 'store'])->name('store');
    Route::get('/{film}', [CommentsController::class, 'show'])->name('show');
});
