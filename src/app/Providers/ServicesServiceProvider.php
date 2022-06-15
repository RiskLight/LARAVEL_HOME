<?php

namespace App\Providers;

use App\Contracts\FilmServiceContract;
use App\Contracts\GenreServiceContract;
use App\Contracts\UserServiceContract;
use App\Services\FilmService;
use App\Services\GenreService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public $bindings = [
        FilmServiceContract::class => FilmService::class,
        GenreServiceContract::class => GenreService::class,
        UserServiceContract::class => UserService::class
    ];
}
