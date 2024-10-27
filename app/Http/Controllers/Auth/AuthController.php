<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class AuthController extends Controller {
    public function register(Request $request) {

        $validation = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|',
            'avatar' => 'nullable|max:3000|file|mimes:png,jpg',
            "password" => 'required|confirmed',

        ]);

        if ($request->hasFile('avatar')) {
            $validation['avatar'] = Storage::disk('public')->put('avatar', $validation['avatar']);
        }

        $user = User::create($validation);

        Auth::login($user);

        return redirect()->route('dashboard')->with('message', ' Registered successfully');

    }

    public function login(Request $request) {

        $validation = $request->validate([

            'email' => 'required|email',
            "password" => 'required',

        ]);

        if (Auth::attempt($validation, true)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('message','login successfully');
        }

        return back()->withErrors(['email' => 'The provided email and password do not match'])->onlyInput('email');

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'you have logout successfully');
    }
}
