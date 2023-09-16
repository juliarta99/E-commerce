<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
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
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return Redirect::back()->withErrors(['error' => 'Email or password not failed']);
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
        $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'password' => ['required', Password::min(8)->numbers()->symbols()],
                'konfirmasiPassword' => 'required|same:password'
            ]
        );
        $request['password'] = Hash::make($request->password);

        $user = User::create($request->except('_token'));

        event(new Registered($user));

        auth()->login($user);

        return redirect('/')->with('succes', 'Akun berhasil dibuat!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
