<?php

namespace App\Http\Controllers;

use App\Models\scores;
use App\Rules\checkStudentCode;
use App\Rules\duplicateClassCode;
use App\Rules\duplicateStudentInClass;
use Illuminate\Http\Request;

class scoresManagerController extends Controller
{
    public function create($classCode)
    {
        $active = 'class';
        return view('backend.scoresManager.create', compact('active', 'classCode'));
    }
    public function store(Request $request, $classCode)
    {
        $request->validate([
            'studentCode' => ['required', new checkStudentCode],
        ]);
        $check = scores::create(array_merge($request->input(), [
            'classCode' => $classCode
        ]));
        if ($check) {
            return redirect('classManager/' . $classCode)->with('Thêm mới học sinh thành công');
        }
        return redirect('classManager/' . $classCode)->with('Thêm mới học sinh thất bại, vui lòng thử lại sau');
    }
    public function destroy($id, $classCode)
    {
        scores::find($id)->delete();
        return redirect('classManager/' . $classCode)->with('Xóa học viên trong lớp thành công');
    }
    public function edit($id, $classCode)
    {
        $scores = scores::find($id);
        $active = 'class';
        return view('backend.scoresManager.edit', compact('scores', 'classCode', 'active'));
    }
    public function update(Request $request, $id, $classCode)
    {
        $scores = scores::find($id);
        // dd($request->input());
        $request->validate([
            'studentCode' => ['required', new duplicateStudentInClass],
            'pointDiscussion' => 'required'
        ]);
        $scores->update($request->input());
        return redirect('classManager/' . $classCode)->with('Cập nhật điểm học viên thành công');
    }
}
