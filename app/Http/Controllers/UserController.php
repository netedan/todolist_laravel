<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::withCount('projects');

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

        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        if (!in_array($order, ['id', 'name'])) {
            $sort = 'id';
        }

        $users = $query->orderBy($sort, $order)->get();

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
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

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
