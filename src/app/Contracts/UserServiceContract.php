<?php

namespace App\Contracts;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

interface UserServiceContract
{
    public function index(): object;

    public function store(UserRequest $request): void;

    public function update(UserUpdateRequest $request, $id): void;

    public function destroy($id): void;

    public function getRole(): object;

    public function edit($id): object;

}
