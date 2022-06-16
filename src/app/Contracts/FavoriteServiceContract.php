<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface FavoriteServiceContract
{
    public function index(): object;

    public function store(Request $request): void;

    public function destroy($id): void;

}
