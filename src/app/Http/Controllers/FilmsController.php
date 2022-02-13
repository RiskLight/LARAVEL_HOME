<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Standart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\PrettyPrinter\Standard;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        $genres = Genre::all();
        return view('site.main', ['genres' => $genres]);
    }

    public function indexGenre()
    {
        //
        $genres = Genre::all();
        return view('site.genre', ['genres' => $genres]);
    }
    public function indexFavorite()
    {
        //
        return view('site.favorite');
    }

    public function indexSerials()
    {
        //
        $genres = Genre::all();
        return view('site.serials', ['genres' => $genres]);
    }
    public function adminIndex()
    {
        return view('admin_panel.films');
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
        return view('admin_panel.add_film', ['standarts' => $standarts],['genres' => $genres] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        Film::create([
            'name'=>$request->name,
            'custom_id'=>$request->custom_id,
            'img_path'=>$request->img_path,
            'description'=>$request->description,
            'year'=>$request->year,
            'standart_id'=>$request->standart
        ]);
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
     * @param  \Illuminate\Http\Request  $request
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
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
