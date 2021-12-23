<?php

namespace App\Http\Controllers;

use App\Models\subjects;
use App\Rules\duplicateSubjectCode;
use Illuminate\Http\Request;
use PharIo\Manifest\License;

class subjectController extends Controller
{
    //
    public function index()
    {
        $listSubject = subjects::paginate(10);
        $active = 'subject';
        return view('backend.subjectManager.index', compact('listSubject', 'active'));
    }
    public function create()
    {
        $active = 'subject';
        return view('backend.subjectManager.create', compact('active'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'subjectCode' => ['required', new duplicateSubjectCode],
            'subject' => ['required'],
        ]);

        $check = subjects::create($request->input());
        if ($check) {
            return redirect(url('subjectManager'))->with('message', 'Thêm mới môn học thành công');
        }
        return redirect(url('subjectManager'))->with('message', 'Thêm mới môn học thất bại, vui lòng thử lại sau');
    }
    public function destroy(subjects $subjectManager)
    {
        $subjectManager->delete();
        return redirect(url('subjectManager'))->with('message', 'Xóa môn học thành công');
    }
    public function edit(subjects $subjectManager)
    {
        $active = 'subject';
        return view('backend.subjectManager.edit', compact('active', 'subjectManager'));
    }
    public function update(Request $request, subjects $subjectManager)
    {
        $request->validate([
            'subjectCode' => ['required'],
            'subject' => ['required'],
        ]);
        $check = $subjectManager->update($request->input());
        if ($check) {
            return redirect(url('subjectManager'))->with('message', 'Cập nhật môn học thành công');
        }
        return redirect(url('subjectManager'))->with('message', 'Cập nhật môn học thất bại, vui lòng thử lại sau');
    }
}
