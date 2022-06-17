<?php

namespace App\Http\Controllers;

use App\Contracts\FilmServiceContract;
use App\Filters\GenreFilter;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Standart;
use http\Client\Curl\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FilmsController extends Controller
{
    private $service;

    public function __construct(FilmServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index($standartId = null, $genreId = null)
    {
        $films = $this->service->index($standartId, $genreId);
        $years = $films->map(function ($film){
            return substr($film->year, 0, 4);
        });
        $years = $years->unique()->sort();
        $genres = $this->service->createGenre();

        return view('site.main', ['films' => $films, 'genres' => $genres, 'years' => $years]);

    }

    public function adminIndex()
    {
        $films = $this->service->adminIndex();

        return view('admin_panel.films', ['films' => $films]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $standarts = $this->service->createStandart();

        $genres = $this->service->createGenre();

        return view('admin_panel.add_film', ['standarts' => $standarts, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FilmRequest $request
     * @return RedirectResponse
     */
    public function store(FilmRequest $request)
    {
        $this->service->store($request);

        return redirect()->route('admin.films.create')->with('message', 'Фильм успешно добавлен в базу!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $film = $this->service->show($id);

        return view('site.film_page', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $film = $this->service->show($id);

        $standarts = $this->service->createStandart();

        $genres = $this->service->createGenre();

        return view('admin_panel.edit_film', ['film' => $film, 'standarts' => $standarts, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FilmUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(FilmUpdateRequest $request, $id)
    {
        $this->service->update($request, $id);

        return redirect()->route('admin.films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->service->destroy($id);

        return redirect()->route('admin.films.index');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        $years = $this->service->years()->map(function ($year){
            return substr($year->year, 0, 4);
        })->unique();
        $films = $this->service->search($request);
        $genres = $this->service->createGenre();

        return view('site.main', ['films' => $films,'genres' => $genres, 'years' => $years ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function adminSearch(Request $request)
    {
        $films = $this->service->search($request);

        return view('admin_panel.films', ['films' => $films]);
    }


    public function sort(Request $request)
    {
        $films = $this->service->sort($request);

        $years = $this->service->years()->map(function ($year){
            return substr($year->year, 0, 4);
        })->unique();
        $genres = $this->service->createGenre();
        return view('site.main', ['films' => $films, 'genres' => $genres, 'years' => $years]);

    }
}

