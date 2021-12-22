<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function showLogin()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        // dd($request->input('email'));
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return view('welcome');
        } else {
            return view('frontend.auth.login')->with('message', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
