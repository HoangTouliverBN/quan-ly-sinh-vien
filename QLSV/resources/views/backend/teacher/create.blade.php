@extends('backend.layout.index')
@section('content')
  <div class="container">
    <h1 class="text-center">Thêm giáo viên</h1>
    <form action="{{ url('teacherManager') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Tên giáo viên:</label>
        <input type="text" name="name" id="name" class="form-control">
        <p class="text-danger">@error('name')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="id">Mã giáo viên</label>
        <input type="text" name="id" id="id" class="form-control">
        <p class="text-danger">@error('id')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control">
        <p class="text-danger">@error('email')
            {{ $message }}
          @enderror</p>
      </div>

      <div>
        <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ url('teacherManager') }}" class="btn btn-primary">Quay lại</a>
      </div>
    </form>
  </div>
@endsection
