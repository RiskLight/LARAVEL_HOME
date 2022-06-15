<?php

namespace App\Http\Controllers;

use App\Contracts\FilmServiceContract;
use App\Contracts\GenreServiceContract;
use App\Models\Genre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenresController extends Controller
{

    private $service;

    public function __construct(GenreServiceContract $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $genres = $this->service->index();
        return view('site.genre', ['genres' => $genres]);
    }
}
