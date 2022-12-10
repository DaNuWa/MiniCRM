<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('company')->paginate();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(UsersRequest $request)
    {
        User::create($request->validated());
        flash('Successfully created the user!')->success();
        return to_route('users.index');

    }


    public function show(User $user)
    {
       return view('user.show',compact('user'));
    }


    public function edit(User $user)
    {
        return view('user.edit', compact('user'));

    }


    public function update(UserUpdateRequest $request, $id)
    {
        User::where('id',$id)->update($request->validated());
        return to_route('users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index');
    }
}
