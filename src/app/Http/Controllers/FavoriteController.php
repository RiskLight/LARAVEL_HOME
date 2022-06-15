<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmUser;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $films = Film::whereHas('users', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        })->paginate(18);

       return view('site.favorite', ['films' => $films]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        FilmUser::create($data);
        return redirect()->route('films.favorite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        FilmUser::where('film_id', $id)->where('user_id', auth()->user()->id)->delete();
        return redirect()->route('films.favorite.index');
    }
}
