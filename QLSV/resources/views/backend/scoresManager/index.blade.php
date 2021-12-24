@extends('backend.layout.index')

@section('content')
  <div>
    <div>
      <div>
        <h1 class="text-center">Thông tin lớp học</h1>
        <div>
          <ul>
            <li>
              <h4>Mã lớp học: {{ $classManager->classCode }}</h4>
            </li>
            <li>
              <h4>Tên lớp học: {{ $classManager->name }}</h4>
            </li>
            <li>
              <h4>Tên môn học: {{ $subject->subject }}</h4>
            </li>
            <li>
              <h4>Tên giáo viên: {{ $teacher->name }}</h4>
            </li>
            <li>
              <h4>Số lượng học viên: {{ count($studentManager) }}</h4>
            </li>
          </ul>
        </div>
      </div>
      <div>
        <a href="{{ url('scoresManager/create/' . $classManager->classCode) }}" class="btn btn-success">+ Thêm mới học sinh</a>
      </div>
    </div><br>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Mã học viên</th>
          <th scope="col">Tên học viên</th>
          <th scope="col">KT1</th>
          <th scope="col">KT2</th>
          <th scope="col">BTL</th>
          <th scope="col">GK</th>
          <th scope="col">ĐK</th>
          <th scope="col">CK</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($studentManager as $Class)
          <tr class="">
            <td scope="row">{{ $Class->studentCode }}</td>
            <td scope="row">{{ $Class->name }}</td>
            <td scope="row">{{ $Class->pointOne }}</td>
            <td scope="row">{{ $Class->pointTwo }}</td>
            <td scope="row">{{ $Class->pointDiscussion }}</td>
            <td scope="row">{{ $Class->pointMidterm }}</td>
            <td scope="row">{{ $Class->pointCondition }}</td>
            <td scope="row">{{ $Class->pointFinal }}</td>
            <td>
              <a href="{{ url('scoresManager/' . $Class->id . '/' . $Class->classCode . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
              <form action="{{ url('scoresManager/' . $Class->id . '/' . $Class->classCode . '/delete') }}" class="d-inline" method="POST"
                onsubmit="return confirm('Bạn có chắc chắn xóa')">
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background-color: WHITE; color:#007bff;"><i class="fas fa-trash"></i></a></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $studentManager->links('pagination::bootstrap-4') }}
  </div>
@endsection
