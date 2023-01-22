<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login',
        [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email:dns',
                'password' => 'required'
            ]
        );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors('error', 'Email or password not failed');
    }

    public function create()
    {
        return view('register',
        [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData =  $request->validate(
            [
                'name' => 'required|max:50',
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email:dns',
                'no_hp' => 'required',
                'password' => ['required', Password::min(8)->numbers()->symbols()->mixedCase()]
            ]
        );

        $validateData['password'] = Hash::make($request->password);

        User::create($validateData);
        return redirect('/login')->with('succes', 'Register berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
