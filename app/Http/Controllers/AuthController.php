<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // penting!

            $user = Auth::user();

            if ($user->role == 'dpd') {
                return redirect()->route('dashboard.dpd');
            } elseif ($user->role == 'dpc') {
                return redirect()->route('dashboard.dpc');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Role tidak dikenali.']);
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
