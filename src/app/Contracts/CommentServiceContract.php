<?php

namespace App\Contracts;

use App\Http\Requests\CommentRequest;
use App\Models\Film;

interface CommentServiceContract
{
    public function index(): object;

    public function store(CommentRequest $request, Film $film): void;

    public function update(CommentRequest $request, $film, $id): void;

    public function destroy($id): void;

}
