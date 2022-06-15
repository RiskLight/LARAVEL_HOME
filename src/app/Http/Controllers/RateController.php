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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        Rate::updateOrCreate(
            ['user_id' => auth()->user()->id, 'film_id' => $request->get('film_id')],
            ['points' => $request->get('points')]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {

        $rate = Rate::where('film_id', $id)->avg('points');
        $exactRating = round($rate, 2);

        return response()->json($exactRating);
    }
}
