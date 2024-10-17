<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
class AuthController extends Controller
{
    public function create()
    {
        return view('auth');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/users');
        }

        return back()->withErrors([
            'email' => 'Указанные учетные данные неверны.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/auth');
    }
}
