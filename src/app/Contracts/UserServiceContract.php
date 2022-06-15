<?php

namespace App\Contracts;

use App\Http\Requests\UserRequest;

interface UserServiceContract
{
    public function index(): object;

    public function store(UserRequest $request): void;

    public function update(UserRequest $request, $id): void;

    public function destroy($id): void;

    public function getRole(): object;

    public function edit($id): object;

}
