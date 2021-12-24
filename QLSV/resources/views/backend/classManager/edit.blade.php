@extends('backend.layout.index')
@section('content')
  <div class="container">
    <h1 class="text-center">Thêm lớp học</h1>
    <form action="{{ url('classManager') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Tên lớp học:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $classManager->name }}">
        <p class="text-danger">@error('name')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="classCode">Mã lớp học</label>
        <input type="text" name="classCode" id="classCode" class="form-control" value="{{ $classManager->classCode }}">
        <p class="text-danger">@error('classCode')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="subjectCodeClass">Môn học</label>
        <select name="subjectCodeClass" id="subjectCodeClass" class="form-control">
          <option value=""></option>
          @foreach ($listSubject as $subject)
            <option value="{{ $subject->subjectCode }}" {{ $classManager->subjectCodeClass == $subject->subjectCode ? 'selected' : '' }}>
              {{ $subject->subject . ': ' . $subject->subjectCode }}</option>
          @endforeach
        </select>
        <p class="text-danger">@error('subjectCodeClass')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="idTeacher">Giáo viên phụ trách</label>
        <select name="idTeacher" id="idTeacher" class="form-control">
          <option value=""></option>
          @foreach ($listTeacher as $teacher)
            <option value="{{ $teacher->id }}" {{ $classManager->idTeacher == $teacher->id ? 'selected' : '' }}>
              {{ $teacher->name . ': ' . $teacher->id }}</option>
          @endforeach
        </select>
        <p class="text-danger">@error('idTeacher')
            {{ $message }}
          @enderror</p>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
      <a href="{{ url('classManager') }}" class="btn btn-primary">Quay lại</a>
  </div>
  </form>
  </div>
@endsection
