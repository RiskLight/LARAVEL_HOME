<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceContract;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    private $service;

    public function __construct(UserServiceContract $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
//        $users = User::paginate(10);
        $users = $this->service->index();
        return view('admin_panel.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
//        $roles = Role::all();
        $roles = $this->service->getRole();
        return view('admin_panel.add_user', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
//        $data = $request->except('_token');
//        $data['password'] = Hash::make($request->password);
//        User::create($data);
        $this->service->store($request);
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
//        $user = User::find($id);
//        $roles = Role::all();
        $user = $this->service->edit($id);
        $roles = $this->service->getRole();

        return view('admin_panel.edit_user', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
//        $data = $request->except('_token', 'method');
//        $user = User::find($id);
//        $user->update($data);
//        $user->save($data);
        $this->service->update($request, $id);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
//        $user = User::find($id);
//        $user->delete();
        $this->service->destroy($id);
        return redirect()->route('admin.users.index');
    }
}
