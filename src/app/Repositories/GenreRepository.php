<?php

namespace App\Repositories;

use App\Models\Genre;

class GenreRepository
{
    private function query()
    {
        return Genre::query();
    }

    public function create()
    {
        return $this->query()->get();
    }
}
