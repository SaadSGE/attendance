<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Log::info('work');
            // Authentication passed...
            //return redirect()->intended('/dashboard'); // Redirect to the intended page after login
        }

        // Authentication failed...
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
