@extends('backend.layout.index')

@section('content')
  <div class="tab-pane fade show active" id="quanlysach" role="tabpanel" aria-labelledby="v-pills-home-tab">

    <div>
      <div>
        <h1 class="text-center">Danh sách học viên</h1>
        <div>
          <a href="{{ url('studentManager/create') }}" class="btn btn-success">+ Thêm mới</a>
        </div>
      </div><br>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Tên học viên</th>
            <th scope="col">Mã học viên</th>
            <th scope="col">Năm sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($listStudent as $student)
            <tr class="">
              <td scope="row">{{ $student->name }}</td>
              <td scope="row">{{ $student->studentCode }}</td>
              <td scope="row">{{ $student->dob }}</td>
              <td scope="row">{{ $student->gender }}</td>
              <td>
                {{-- <a href="{{ url('studentManager/' . $student->studentCode) }}"><i class="far fa-eye"></i></a> --}}
                <a href="{{ url('studentManager/' . $student->studentCode . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ url('studentManager/' . $student->studentCode) }}" class="d-inline" method="POST"
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
      {{ $listStudent->links('pagination::bootstrap-4') }}
    </div>

  </div>

@endsection
