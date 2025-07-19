<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Show the registration form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle logout (for Firebase auth, this will be handled on frontend)
     */
    public function logout(Request $request)
    {
        // Since we're using Firebase Auth, logout is handled on the frontend
        // This route can be used for any server-side cleanup if needed
        return redirect()->route('home')->with('message', 'Anda telah berhasil logout');
    }
}