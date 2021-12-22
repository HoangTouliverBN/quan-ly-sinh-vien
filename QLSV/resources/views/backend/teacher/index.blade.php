@extends('backend.layout.index')

@section('content')
  <div class="tab-pane fade show active" id="quanlysach" role="tabpanel" aria-labelledby="v-pills-home-tab">

    <div>
      <div>
        <h1 class="text-center">Danh sách giáo viên</h1>
        <div>
          <a href="{{ url('teacherManager/create') }}" class="btn btn-success">+ Thêm mới</a>
        </div>
      </div><br>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Tên giáo viên</th>
            <th scope="col">Mã Giáo viên</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($teacherManager as $teacher)
            <tr class="">
              <td scope="row">{{ $teacher->name }}</td>
              <td scope="row">{{ $teacher->id }}</td>
              <td scope="row">{{ $teacher->email }}</td>
              <td>
                {{-- <a href="{{ url('teacherManager/' . $teacher->id) }}"><i class="far fa-eye"></i></a> --}}
                <a href="{{ url('teacherManager/' . $teacher->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
                <form action="{{ url('teacherManager/' . $teacher->id) }}" class="d-inline" method="POST"
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
      {{ $teacherManager->links('pagination::bootstrap-4') }}
    </div>

  </div>

@endsection
