<?php

namespace App\Repositories;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateRepository
{

    private function query()
    {
        return Rate::query();
    }

    public function store(Request $request)
    {
        return $this->query()->updateOrCreate(
            ['user_id' => auth()->user()->id, 'film_id' => $request->get('film_id')],
            ['points' => $request->get('points')]
        );
    }

    public function show($id)
    {
        $rate = $this->query()->where('film_id', $id)->avg('points');
        return round($rate, 2);
    }
}
