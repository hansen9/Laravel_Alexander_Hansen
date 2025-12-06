<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
        ]);

        $username = $request->input('username');

        // Check database for user
        $user = DB::table('users')->where('username', $username)->first();

        if ($user) {
            session(['user' => $username]);
            return redirect('/dashboard');
        }

        return back()->withErrors(['username' => 'Username tidak valid'])->withInput();
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}
