<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin()
    {
        return view('signin');
    }

    public function store()
    {

        $validated = request()->validate(
            [
                'name' => 'required | min : 3 | max : 30',
                'email' => 'required | email | unique:users,email',
                'password' => 'required | confirmed | min : 6'
            ]
        );

        User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }


    public function login()
    {

        return view('login');
    }

    public function authenticate()
    {

        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }                   //this takes tha info in tha $validated array and auto runs them t see if they exist in tha db then returns T or F
        //if tru it auto saves tha session / we remove any former session / then redirect w success message

        return redirect()->route('login')->withErrors([
            'email' => 'No matching User found with the provided email and password'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
    }
}
