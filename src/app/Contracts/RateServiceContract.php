<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface RateServiceContract
{
    public function store(Request $request): void;

    public function show($id): float;
}
