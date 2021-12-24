@extends('backend.layout.index')
@section('content')
  <div class="container">
    <h1 class="text-center">Cập nhật môn học</h1>
    <form action="{{ url('subjectManager/' . $subjectManager->subjectCode) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="subject">Tên môn học:</label>
        <input type="text" name="subject" id="subject" class="form-control" value="{{ $subjectManager->subject }}">
        <p class="text-danger">@error('subject')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="subjectCode">Mã môn học</label>
        <input type="text" name="subjectCode" id="subjectCode" class="form-control" value="{{ $subjectManager->subjectCode }}">
        <p class="text-danger">@error('subjectCode')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div>
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ url('subjectManager') }}" class="btn btn-primary">Quay lại</a>
      </div>
    </form>
  </div>
@endsection
