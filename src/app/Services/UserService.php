<?php

namespace App\Services;

use App\Contracts\UserServiceContract;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

class UserService implements UserServiceContract
{

    private $repository;

    private $repositoryRole;

    public function __construct(UserRepository $repository, RoleRepository $repositoryRole)
    {
        $this->repository = $repository;

        $this->repositoryRole = $repositoryRole;
    }

    public function index(): object
    {
        // TODO: Implement index() method.
        return $this->repository->index();
    }

    public function destroy($id): void
    {
        // TODO: Implement destroy() method.
        $this->repository->destroy($id);

    }
    public function store(UserRequest $request): void
    {
        // TODO: Implement store() method.
        $this->repository->store($request);
    }
    public function update(UserUpdateRequest $request, $id): void
    {
        // TODO: Implement update() method.
        $this->repository->update($request, $id);
    }

    public function getRole(): object
    {
        // TODO: Implement getRole() method.
        return $this->repositoryRole->index();
    }

    public function edit($id): object
    {
        // TODO: Implement edit() method.
        return $this->repository->edit($id);
    }

}
