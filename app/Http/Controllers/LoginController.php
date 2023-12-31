<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username'=>['required'],
            'password'=>['required']
            ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $role = $user->role_id;

            if ($role === 1) {
                return redirect()->intended('/categories');

            } else if ($role === 2) {
                return redirect()->intended('/news');
            }
            
            return redirect('/');
        }
        
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
