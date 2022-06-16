<?php

namespace App\Providers;

use App\Contracts\CommentServiceContract;
use App\Contracts\FavoriteServiceContract;
use App\Contracts\FilmServiceContract;
use App\Contracts\GenreServiceContract;
use App\Contracts\RateServiceContract;
use App\Contracts\UserServiceContract;
use App\Services\CommentService;
use App\Services\FavoriteService;
use App\Services\FilmService;
use App\Services\GenreService;
use App\Services\RateService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public $bindings = [
        FilmServiceContract::class => FilmService::class,
        GenreServiceContract::class => GenreService::class,
        UserServiceContract::class => UserService::class,
        FavoriteServiceContract::class => FavoriteService::class,
        CommentServiceContract::class => CommentService::class,
        RateServiceContract::class => RateService::class
    ];
}
