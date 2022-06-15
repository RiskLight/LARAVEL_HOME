<?php

namespace App\Repositories;

use App\Models\Standart;

class StandartRepository
{
    private function query()
    {
        return Standart::query();
    }

    public function create()
    {
        return $this->query()->get();
    }
}
