<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\duplicateTeacherCode;
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
            return redirect('studentManager');
        } else {
            return view('frontend.auth.login')->with('message', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $teacherManager = User::paginate(10);
        $active = 'teacher';
        return view('backend.teacher.index', compact('teacherManager', 'active'));
    }
    public function create()
    {
        $active = 'teacher';
        return view('backend.teacher.create', compact('active'));
    }
    public function destroy(User $teacherManager)
    {
        $teacherManager->delete();
        return redirect(url('teacherManager'))->with('message', 'Xóa giáo viên thành công');
    }
    public function edit(User $teacherManager)
    {
        $active = 'teacher';
        return view('backend.teacher.edit', compact('teacherManager', 'active'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'id' => ['required', new duplicateTeacherCode],
            'email' => ['required', 'email', 'unique:users,email']
        ]);
        $password = $request->input('id');
        $check = User::create(array_merge($request->input(), [
            'password' => $password,
        ]));
        if ($check) {
            return redirect('teacherManager')->with('message', 'Thêm mới giáo viên thành công');
        }
        return redirect('teacherManager')->with('message', 'Thêm mới giáo viên thất bại, vui lòng thử lại sau');
    }
    public function update(Request $request, User $teacherManager)
    {
        $request->validate([
            'name' => ['required'],
            'id' => ['required'],
            'email' => ['required', 'email']
        ]);
        $check = $teacherManager->update($request->input());
        if ($check) {
            return redirect('teacherManager')->with('message', 'Cập nhật giáo viên thành công');
        }
        return redirect('teacherManager')->with('message', 'Cập nhật giáo viên thất bại, vui lòng thử lại sau');
    }
}
