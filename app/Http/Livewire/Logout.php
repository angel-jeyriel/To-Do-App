<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
    }

    public function render()
    {
        return view('logout');
    }
}
