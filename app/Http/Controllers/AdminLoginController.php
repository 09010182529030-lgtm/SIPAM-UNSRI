<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        if (session('admin_login')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            $request->username === 'admin' &&
            $request->password === 'admin123'
        ) {
            session([
                'admin_login' => true,
                'admin_username' => 'admin',
            ]);

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withInput()
            ->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->forget([
            'admin_login',
            'admin_username',
        ]);

        return redirect()->route('admin.login');
    }
}