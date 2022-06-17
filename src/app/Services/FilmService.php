<?php

namespace App\Services;

use App\Contracts\FilmServiceContract;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Jobs\SendFilmInfoJob;
use App\Models\Film;
use App\Repositories\FilmRepository;
use App\Repositories\GenreRepository;
use App\Repositories\StandartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FilmService implements FilmServiceContract
{
    private $repository;

    private $repositoryGenre;

    private $repositoryStandart;


    public function __construct(FilmRepository $repository, StandartRepository $repositoryStandart, GenreRepository $repositoryGenre)
    {
        $this->repository = $repository;

        $this->repositoryStandart = $repositoryStandart;

        $this->repositoryGenre = $repositoryGenre;
    }


    public function index($standartId, $genreId): object
    {
        return $this->repository->index($standartId, $genreId);
    }

    public function store(FilmRequest $request): void
    {
        // TODO: Implement store() method.
        $film = $this->repository->store($request);

        $userInfo = [
            'email' => auth()->user()->email,
            'name' => auth()->user()->name
        ];
        SendFilmInfoJob::dispatch($film, $userInfo);
    }

    public function adminIndex(): object
    {
        // TODO: Implement adminIndex() method.
        return $this->repository->adminIndex();
    }

    public function show($id): object
    {
        // TODO: Implement show() method.
       return $this->repository->show($id);
    }

    public function createStandart(): object
    {
        // TODO: Implement create() method.
        return $this->repositoryStandart->create();

    }

    public function createGenre(): object
    {
        // TODO: Implement create_genre() method.
        return $this->repositoryGenre->create();
    }

    public function update(FilmUpdateRequest $request, $id): void
    {
        // TODO: Implement update() method.
        $this->repository->update($request, $id);
    }

    public function destroy($id): void
    {
        // TODO: Implement destroy() method.
         $this->repository->destroy($id);
    }

    public function search(Request $request): object
    {
        // TODO: Implement search() method.
       return $this->repository->search($request);
    }

    public function sort(Request $request): object
    {
        // TODO: Implement sort() method.
        return $this->repository->sort($request);
    }

    public function years(): object
    {
        // TODO: Implement year() method.
        return $this->repository->years();
    }
}
