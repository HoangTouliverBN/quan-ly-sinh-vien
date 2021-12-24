@extends('backend.layout.index')

@section('content')
  <div>
    <div>
      <h1 class="text-center">Danh sách môn học</h1>
      <div>
        <a href="{{ url('subjectManager/create') }}" class="btn btn-success">+ Thêm mới</a>
      </div>
    </div><br>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Tên môn học</th>
          <th scope="col">Mã môn học</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listSubject as $subject)
          <tr class="">
            <td scope="row">{{ $subject->subject }}</td>
            <td scope="row">{{ $subject->subjectCode }}</td>
            <td>
              {{-- <a href="{{ url('subjectManager/' . $subject->subjectCode) }}"><i class="far fa-eye"></i></a> --}}
              <a href="{{ url('subjectManager/' . $subject->subjectCode . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
              <form action="{{ url('subjectManager/' . $subject->subjectCode) }}" class="d-inline" method="POST"
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
    {{ $listSubject->links('pagination::bootstrap-4') }}
  </div>
@endsection
