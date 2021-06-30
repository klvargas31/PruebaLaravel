<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users.index')->only(['index', 'show']);
        $this->middleware('permission:users.store')->only('store');
        $this->middleware('permission:users.update')->only('update');
        $this->middleware('permission:users.destroy')->only('destroy');
    }

    public function index()
    {
        return User::all();
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->password = bcrypt ($user->password);
        $user->save();

        return $user;
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(UserRequest $request, User $user)
    {
        $user = $user->fill($request->all());
        $user->password = bcrypt ($user->password);
        $user->save();

        return $user;
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }

    public function showByName(string $name)
    {
        $users = User::where('name', 'like', "%{$name}%")->get();

        return $users;
    }
}
