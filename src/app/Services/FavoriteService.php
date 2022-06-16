<?php

namespace App\Services;

use App\Contracts\FavoriteServiceContract;
use App\Repositories\FavoriteRepository;
use Illuminate\Http\Request;

class FavoriteService implements FavoriteServiceContract
{
    private $repository;

    public function __construct(FavoriteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): object
    {
        // TODO: Implement index() method.
        return $this->repository->index();
    }

    public function store(Request $request): void
    {
        // TODO: Implement store() method.
        $this->repository->store($request);
    }

    public function destroy($id): void
    {
        // TODO: Implement destroy() method.
        $this->repository->destroy($id);
    }
}
