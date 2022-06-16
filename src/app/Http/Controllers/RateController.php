<?php

namespace App\Http\Controllers;

use App\Contracts\RateServiceContract;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RateController extends Controller
{

    private $service;

    public function __construct(RateServiceContract $service)
    {
        $this->service = $service;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->service->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $exactRating = $this->service->show($id);

        return response()->json($exactRating);
    }
}
