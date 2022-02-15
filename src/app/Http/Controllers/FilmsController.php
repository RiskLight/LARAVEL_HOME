<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Standart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index($standartId = null, $genreId = null)
    {
        if ($standartId && $standartId !== 'all') {
            $films = Film::where('standart_id', $standartId)->get();
        } else {
            $films = Film::all();
        }

        if ($genreId) {
            $films = Film::whereHas('genres', function ($query) use ($genreId) {
                $query->where('genres.id', $genreId);
            })->get();
        }
        return view('site.main', ['films' => $films]);
    }

    public function indexFavorite()
    {
        return view('site.favorite');
    }


    public function adminIndex()
    {
        $films = Film::all();
        return view('admin_panel.films', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        //
        $standarts = Standart::all();
        $genres = Genre::all();
        return view('admin_panel.add_film', ['standarts' => $standarts, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $film = Film::create([
            'name' => $request->name,
            'film_path' => $request->film_path,
            'img_path' => $request->img_path,
            'description' => $request->description,
            'year' => $request->year,
            'standart_id' => $request->standart,
        ]);

        $film->genres()->sync($request->genre);

        return redirect()->route('admin.films.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $film = Film::find($id);
        return view('site.film_page', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
