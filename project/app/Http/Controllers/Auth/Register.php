<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // 1. If the request is a GET, just show the registration form
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        // 2. If the request is a POST, validate and create the user
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Requires 'password_confirmation' input
        ]);

        // 3. Create the user in the database
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // 4. Log the user in immediately
        Auth::login($user);

        // 5. Redirect to the home page with a success message
        return redirect('/')->with('success', 'Account created successfully! Welcome!');
    }
}