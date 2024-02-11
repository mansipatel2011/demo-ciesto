<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display login page.
     */
    public function login()
    {
        return view('admin.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('shops.index');
        }

        return back()->withErrors(['login' => 'Invalid email or password. Please try again.'])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}