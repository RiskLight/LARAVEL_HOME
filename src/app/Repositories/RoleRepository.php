<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
  private function query()
  {
      return Role::query();
  }

  public function index()
  {
      return $this->query()->get();
  }
}
