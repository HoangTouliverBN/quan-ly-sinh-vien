<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\scores;
use App\Models\subjects;
use App\Models\User;
use App\Rules\duplicateClassCode;
use Illuminate\Http\Request;

class classManagerController extends Controller
{
    //
    public function index()
    {
        $listClass = classroom::join('users', 'users.id', '=', 'classroom.idTeacher')
            ->join('subjects', 'subjects.subjectCode', '=', 'subjectCodeClass')
            ->paginate(9, ['classroom.classCode', 'classroom.name', 'subjects.subject', 'users.name as nameTeacher']);
        $active = 'class';
        return view('backend.classManager.index', compact('active', 'listClass'));
    }
    public function create()
    {
        $listTeacher = User::all();
        $listSubject = subjects::all();
        $active = 'class';
        return view('backend.classManager.create', compact('active', 'listTeacher', 'listSubject'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'classCode' => ['required', new duplicateClassCode],
            'idTeacher' => 'required',
            'subjectCodeClass' => 'required'
        ]);
        $check = classroom::create($request->input());
        if ($check) {
            return redirect('classManager')->with('Thêm mới lớp học thành công');
        }
        return redirect('classManager')->with('Thêm mới lớp học thất bại, vui lòng thử lại sau');
    }
    public function edit(classroom $classManager)
    {
        $listTeacher = User::all();
        $listSubject = subjects::all();
        $active = 'class';
        return view('backend.classManager.edit', compact('active', 'listTeacher', 'listSubject', 'classManager'));
    }
    public function destroy(classroom $classManager)
    {
        $classManager->delete();
        return redirect(url('classManager'))->with('message', 'Xóa lớp học thành công');
    }

    public function update(Request $request, classroom $classManager)
    {
        $request->validate([
            'name' => 'required',
            'classCode' => ['required'],
            'idTeacher' => 'required',
            'subjectCodeClass' => 'required'
        ]);
        $check = $classManager->update($request->input());
        if ($check) {
            return redirect('classManager')->with('Cập nhật lớp học thành công');
        }
        return redirect('classManager')->with('Cập nhật lớp học thất bại, vui lòng thử lại sau');
    }
    public function show(classroom $classManager)
    {
        $active = 'class';
        $subject = subjects::find($classManager->subjectCodeClass);
        $teacher = User::find($classManager->idTeacher);
        $studentManager = scores::join('students_information','students_information.studentCode','=','scores.studentCode')->where('classCode',$classManager->classCode)->paginate(20,['scores.*','name']);
        return view('backend.scoresManager.index', compact('classManager','active','subject','teacher','studentManager'));
    }
}
