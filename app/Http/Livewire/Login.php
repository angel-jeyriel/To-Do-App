<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
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
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching User found with the provided email and password'
        ]);
    }

    public function render()
    {
        return view('login');
    }
}
