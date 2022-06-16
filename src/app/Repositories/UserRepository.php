<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private function query()
    {
        return User::query();
    }

    public function index()
    {
        // TODO: Implement index() method.
        return $this->query()->paginate(10);
    }

    public function store(UserRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);
        $data['active'] = '1';
        $this->query()->create($data);
    }

    public function edit($id)
    {
        return $this->query()->find($id);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->except('_token', 'method');
        $user = $this->query()->find($id);
        $user->update($data);
        $user->save($data);
    }

    public function destroy($id)
    {
        $user = $this->query()->find($id);
        $user->delete();
    }
}
