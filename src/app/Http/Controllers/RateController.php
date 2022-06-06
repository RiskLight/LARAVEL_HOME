<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
//        $points = $request->get('points');
        $data['points'] = $request->get('points');
        $data['votes'] = $request->get('votes');
        $data['film_id'] = $request->get('film_id');
        $data['user_id'] = auth()->user()->id;
        Rate::create($data);
//        dd($points);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
//        $rate = Rate::whereHas('films', function (Builder $query) use ($id) {
//            $query->where('film_id', $id);
//        })->avg('points')->get();

        $rate = Rate::where('film_id', $id)->avg('votes');
        $exactRating = round($rate, 2);
        $approximateRating = round($rate);

        return response()->json($exactRating);
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
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
