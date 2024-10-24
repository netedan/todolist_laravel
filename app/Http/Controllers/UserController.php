<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('name')){
            $query->where('name', 'like', '%'.$request->get('name').'%');
        }

        if ($request->filled('surname')){
            $query->where('surname', 'like', '%'.$request->get('surname').'%');
        }

        if ($request->filled('patronymic')){
            $query->where('patronymic', 'like', '%'.$request->get('patronymic').'%');
        }

        if ($request->filled('user_id')){
            $query->where('id', $request->get('user_id'));
        }

        $users = $query->get();

        return view('users.users', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/users/user_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request['user_name'],
            'surname' => $request['user_surname'],
            'patronymic' => $request['user_patronymic'],
        ]);
        return redirect('/users');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('/users/user', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('/users/user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request['user_name'];
        $user->surname = $request['user_surname'];
        $user->patronymic = $request['user_patronymic'];
        $user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
