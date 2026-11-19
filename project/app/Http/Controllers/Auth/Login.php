<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // 1. If it's a GET request, show the login form
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        // 2. If it's a POST request, validate the inputs
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // 3. Attempt to log the user in
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerate session for security (prevents session fixation attacks)
            $request->session()->regenerate();

            // Redirect to the home page
            return redirect('/')->with('success', 'Welcome back!');
        }

        // 4. If login fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}