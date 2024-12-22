<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function log(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to find the user
        $user = User::where('email', $request->email)->first();

        // Check the user's password
        if ($user && Hash::check($request->password, $user->password)) {
            // Login successful
            Auth::login($user);
            return redirect()->route('dashboard'); // Redirect to a dashboard route
        }

        // Login failed
        return back()->withErrors(['Invalid email or password.']);
    }
}
