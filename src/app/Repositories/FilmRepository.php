<?php

namespace App\Repositories;

use App\Http\Requests\FilmRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmRepository
{
    private function query()
    {
        return Film::query();
    }

    public function index($standartId, $genreId): object
    {
        $query = $this->query();
        if ($standartId && $standartId !== 'all') {
            $query = $query->where('standart_id', $standartId);
        }

        if ($genreId) {
            $query = $query->whereHas('genres', function ($query) use ($genreId) {
                $query->where('genres.id', $genreId);
            });
        }
        return $query->paginate(18);
    }

    public function adminIndex()
    {
        return $this->query()->paginate(10);
    }

    public function store(FilmRequest $request) {
        $data = $request->except('_token', 'genres');
        $data['img_path'] = $request->file('img_path')->store('images');

        $film = $this->query()->create($data);
        $film->genres()->sync($request->genre);
    }

    public function show($id)
    {
        return $this->query()->find($id);
    }

    public function update(FilmUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        if ($request->hasFile('img_path')) {
            $data['img_path'] = $request->file('img_path')->store('images');
        }

        $film = $this->query()->find($id);
        $film->update($data);
        $film->genres()->sync($request->genre);
    }

    public function destroy($id)
    {
        $film = $this->query()->find($id);
        $film->delete();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = $this->query();
        $films = $query->where('name', 'LIKE', "%{$search}%")
            ->orderBy('name');

        return $films->paginate(18);
    }

    public function sort(Request $request)
    {
        $films = $this->query();

        if ($request->filled('year')) {
            $year = $request->get('year');
            $films = $films->where('year', 'LIKE', "%{$year}%");
        }

        if ($request->filled('genre')) {
            $genreId = $request->get('genre');
            $films = $films->whereHas('genres', function ($query) use ($genreId) {
                $query->where('genres.id', $genreId);
            });
        }

        return $films->paginate(18);
    }

    public function years()
    {
       return $this->query()->select('year')->orderBy('year')->get();
    }
}
