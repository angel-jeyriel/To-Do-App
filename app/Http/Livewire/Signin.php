<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Signin extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function signin()
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

        return redirect()->route('dashboard')->with('success', 'Account has been successfully Signed up, now you can Log In below.');
    }

    public function render()
    {
        return view('signin');
    }
}
