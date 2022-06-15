<?php

namespace App\Services;

use App\Contracts\GenreServiceContract;
use App\Repositories\GenreRepository;

class GenreService implements GenreServiceContract
{
    private $repository;

    public function __construct(GenreRepository $repository)
    {
        $this->repository = $repository;

    }

    public function index(): object
    {
        // TODO: Implement index() method.
       return $this->repository->create();
    }

}
