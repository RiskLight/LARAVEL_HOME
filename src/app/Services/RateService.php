<?php

namespace App\Services;

use App\Contracts\RateServiceContract;
use App\Repositories\RateRepository;
use Illuminate\Http\Request;

class RateService implements RateServiceContract
{
    private $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request): void
    {
      $this->repository->store($request);
    }

    public function show($id): float
    {
       return $this->repository->show($id);
    }
}
