@extends('backend.layout.index')
@section('content')
  <div class="container">
    <h1 class="text-center">Thêm học viên</h1>
    <form action="{{ url('teacherManager/' . $teacherManager->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Tên giáo viên:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $teacherManager->name }}">
        <p class="text-danger">@error('name')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="id">Mã giáo viên</label>
        <input type="text" name="id" id="id" class="form-control" value="{{ $teacherManager->id }}">
        <p class="text-danger">@error('id')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="numnber" name="email" id="email" class="form-control" value="{{ $teacherManager->email }}">
        <p class="text-danger">@error('email')
            {{ $message }}
          @enderror</p>
      </div>
      <div>
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ url('teacherManager') }}" class="btn btn-primary">Quay lại</a>
      </div>
    </form>
  </div>
@endsection
