<?php

namespace App\Http\Controllers;

use App\Models\studentInformation;
use App\Rules\duplicateStudentCode;
use Illuminate\Http\Request;

class studentManagerController extends Controller
{
    public function index()
    {
        $listStudent = studentInformation::paginate(10);
        $active = 'student';
        return view('backend.studentManager.index', compact('listStudent', 'active'));
    }

    public function create()
    {
        $active = 'student';
        return view('backend.studentManager.create', compact('active'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'gender' => ['required'],
            'dob' => ['required'],
            'studentCode' => ['required', new duplicateStudentCode],
        ]);

        $create = studentInformation::create($request->input());
        if ($create) {
            return redirect('studentManager')->with('message', 'Thêm mới học viên thành công');
        } else {
            return redirect('studentManager')->with('message', 'Có lỗi xảy ra, vui lòng thử lại sau');
        }
    }

    public function destroy(studentInformation $studentManager)
    {
        $studentManager->delete();
        return redirect(url('studentManager'))->with('message', 'Xóa học viên thành công');
    }

    public function edit(studentInformation $studentManager)
    {
        $active = 'student';
        return view('backend.studentManager.edit', compact('studentManager', 'active'));
    }
    public function update(Request $request, studentInformation $studentManager)
    {
        $request->validate([
            'name' => ['required'],
            'gender' => ['required'],
            'dob' => ['required'],
            'studentCode' => ['required'],
        ]);
        $check = $studentManager->update($request->input());
        if ($check) {
            return redirect(url('studentManager'))->with('message', 'Cập nhật học viên thành công');
        }
        return redirect(url('studentManager'))->with('message', 'Cập nhật học viên thất bại, vui lòng thử lại sau.');
    }
}
