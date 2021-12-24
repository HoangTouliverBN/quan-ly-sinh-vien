@extends('backend.layout.index')
@section('content')
  <div class="container">
    <h1 class="text-center">Thêm học viên</h1>
    <form action="{{ url('studentManager') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Tên học viên:</label>
        <input type="text" name="name" id="name" class="form-control">
        <p class="text-danger">@error('name')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="studentCode">Mã học viên</label>
        <input type="text" name="studentCode" id="studentCode" class="form-control">
        <p class="text-danger">@error('studentCode')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="dob">Năm sinh</label>
        <input type="numnber" name="dob" id="dob" class="form-control">
        <p class="text-danger">@error('dob')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="gender">Giới tính</label>
        <input type="text" name="gender" id="gender" class="form-control">
        <p class="text-danger">@error('gender')
            {{ $message }}
          @enderror</p>
      </div>
      <div>
        <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ url('studentManager') }}" class="btn btn-primary">Quay lại</a>
      </div>
    </form>
  </div>
@endsection
