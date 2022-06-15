<?php

namespace App\Contracts;

use App\Http\Requests\FilmRequest;
use App\Http\Requests\FilmUpdateRequest;
use Illuminate\Http\Request;


interface FilmServiceContract
{

    public function index($standartId, $genreId): object;

    public function store(FilmRequest $request): void;

    public function adminIndex(): object;

    public function show($id): object;

    public function createGenre(): object;

    public function createStandart(): object;

    public function update(FilmUpdateRequest $request, $id): void;

    public function destroy($id): void;

    public function search(Request $request): object;

    public function sort(Request $request): object;

    public function years(): object;
}
