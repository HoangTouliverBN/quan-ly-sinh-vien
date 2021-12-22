<?php

namespace App\Http\Controllers;

use App\Mail\passwordReset;
use App\Models\resetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class resetPasswordController extends Controller
{
    public function ShowEmailRequest()
    {
        return view('frontend.auth.emailPassword');
    }

    public function emailRequest(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $token = Str::random(60);
        $user = User::where('email', $request->input('email'))->first();
        if ($user == null) {
            return view('frontend.auth.emailPassword')->with('error', 'Tài khoản này chưa được đăng ký');
        }
        $passwordReset = resetPassword::updateOrInsert([
            'email' => $user->email,
        ], [
            'token' => $token,
        ]);
        if ($passwordReset) {
            Mail::to($user->email)->send(new passwordReset($token, $user->emai));
        }

        return redirect('/')->with('message', 'Hãy kiểm tra email của bạn');
    }

    public function showResetPassword($token)
    {
        $password = resetPassword::where('token', $token)->first();
        if ($password !== null) {
            return view('frontend.auth.resetPassword', compact('token'));
        }
        return abort(404);
    }

    public function resetPassword(Request $request, $token)
    {
        // dd($request->input('password'));
        $request->validate([
            'password' => ['required', 'min:8'],
            'confirm-password' => ['required', 'same:password'],
        ]);
        $password = resetPassword::where('token', $token)->first();
        $user = User::where('email', $password->email)->first();
        $user->update([
            'password' => $request->input('password'),
        ]);
        if ($user) {
            $password = resetPassword::updateOrInsert([
                'email' => $user->email,
            ], [
                'token' => Str::random(60),
            ]);
            return redirect('/')->with('message','Đặt lại mật khẩu thành công, hãy đăng nhập lại');
        }
    }
}
