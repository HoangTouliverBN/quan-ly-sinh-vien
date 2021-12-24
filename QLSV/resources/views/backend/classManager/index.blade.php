@extends('backend.layout.index')

@section('content')
  <div>
    <div>
      <h1 class="text-center">Danh sách lớp học</h1>
      <div>
        <a href="{{ url('classManager/create') }}" class="btn btn-success">+ Thêm mới</a>
      </div>
    </div><br>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Mã lớp học</th>
          <th scope="col">Tên lớp học</th>
          <th scope="col">Tên môn học</th>
          <th scope="col">Tên giáo viên</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listClass as $Class)
          <tr class="">
            <td scope="row">{{ $Class->classCode }}</td>
            <td scope="row">{{ $Class->name }}</td>
            <td scope="row">{{ $Class->subject }}</td>
            <td scope="row">{{ $Class->nameTeacher }}</td>
            <td>
              <a href="{{ url('classManager/' . $Class->classCode) }}"><i class="far fa-eye"></i></a>
              <a href="{{ url('classManager/' . $Class->classCode . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
              <form action="{{ url('classManager/' . $Class->classCode) }}" class="d-inline" method="POST"
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
    {{ $listClass->links('pagination::bootstrap-4') }}
  </div>
@endsection
