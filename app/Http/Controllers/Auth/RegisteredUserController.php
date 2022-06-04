<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|min:3|max:255',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:8',
        ]);

        $user = User::create($validated);
        Auth::login($user);

        return redirect()->intended(route('admin.cars.index'));
    }
}
