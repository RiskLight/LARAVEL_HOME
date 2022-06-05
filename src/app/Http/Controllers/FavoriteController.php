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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
//        $film = DB::table('film_user')
//            ->where('film_id', $id)
//            ->take(1);
//
//        $film->delete();
        FilmUser::where('film_id', $id)->where('user_id', auth()->user()->id)->delete();
//        dd($film);
//        $film->delete();
        return redirect()->route('films.favorite.index');
    }
}
