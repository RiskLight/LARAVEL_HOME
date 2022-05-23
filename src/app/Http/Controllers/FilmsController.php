<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
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
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index($standartId = null, $genreId = null)
    {
        if ($standartId && $standartId !== 'all') {
            $films = Film::where('standart_id', $standartId)->paginate(2);
        } else {
            $films = Film::paginate(2);
        }

        if ($genreId) {
            $films = Film::whereHas('genres', function ($query) use ($genreId) {
                $query->where('genres.id', $genreId);
            })->paginate(2);
        }
        return view('site.main', ['films' => $films]);

    }

    public function adminIndex()
    {
        $films = Film::paginate(2);
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
     * @param FilmRequest $request
     * @return RedirectResponse
     */
    public function store(FilmRequest $request)
    {
//        $film = Film::create([
//            'name' => $request->name,
//            'film_path' => $request->film_path,
//            'img_path' => $request->file('img_path')->store('images'),
//            'description' => $request->description,
//            'year' => $request->year,
//            'standart_id' => $request->standart,
//
//        ]);
        $data = $request->except('_token', 'genres');
        $data['img_path'] = $request->file('img_path')->store('images');

        $film = Film::create($data);
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
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $film = Film::find($id);
        $standarts = Standart::all();
        $genres = Genre::all();

        return view('admin_panel.edit_film', ['film' => $film, 'standarts' => $standarts, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FilmRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(FilmRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        if ($request->hasFile('img_path')) {
            $data['img_path'] = $request->file('img_path')->store('images');
        }
        $film = Film::find($id);
        $film->update($data);
        $film->genres()->sync($request->genre);
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
        $film = Film::find($id);
        $film->delete();
        return redirect()->route('admin.films.index');
    }
}

