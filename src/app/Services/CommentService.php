<?php

namespace App\Services;

use App\Contracts\CommentServiceContract;
use App\Http\Requests\CommentRequest;
use App\Models\Film;
use App\Repositories\CommentRepository;

class CommentService implements CommentServiceContract
{
    private $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): object
    {
        // TODO: Implement index() method.
        return $this->repository->index();
    }

    public function store(CommentRequest $request, Film $film): void
    {
        // TODO: Implement store() method.
        $this->repository->store($request, $film);
    }

    public function update(CommentRequest $request, $film, $id): void
    {
        // TODO: Implement update() method.

        $this->repository->update($request, $film, $id);
    }

    public function destroy($id): void
    {
        // TODO: Implement destroy() method.
        $this->repository->destroy($id);
    }
}
