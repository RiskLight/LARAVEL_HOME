<?php

namespace App\Repositories;

use App\Models\Film;
use App\Models\FilmUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FavoriteRepository
{
    private function query()
    {
        return FilmUser::query();
    }

    private function queryFilm()
    {
        return Film::query();
    }

    public function index()
    {
        $films = $this->queryFilm()->whereHas('users', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        });

        return $films->paginate(18);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        return $this->query()->create($data);

    }

    public function destroy($id)
    {
        $this->query()->where('film_id', $id)->where('user_id', auth()->user()->id)->delete();
    }
}
