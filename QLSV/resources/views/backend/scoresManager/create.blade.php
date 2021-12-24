@extends('backend.layout.index')
@section('content')
  <div class="container">
    <h1 class="text-center">Thêm học viên vào lớp</h1>
    <form action="{{ url('scoresManager/create/' . $classCode) }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="studentCode">Mã học viên</label>
        <input type="text" name="studentCode" id="studentCode" class="form-control">
        <p class="text-danger">@error('studentCode')
            {{ $message }}
          @enderror</p>
      </div>

      <div class="form-group">
        <label for="pointOne">Điểm kiểm tra 1</label>
        <input type="number" min=0 max=10 name="pointOne" id="pointOne" class="form-control">
        <p class="text-danger">@error('pointOne')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="pointTwo">Điểm kiểm tra 2</label>
        <input type="number" min=0 max=10 name="pointTwo" id="pointTwo" class="form-control">
        <p class="text-danger">@error('pointTwo')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="pointDiscussion">Điểm bài tập lớn</label>
        <input type="number" min=0 max=10 name="pointDiscussion" id="pointDiscussion" class="form-control">
        <p class="text-danger">@error('pointDiscussion')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="pointMidterm">Điểm giữa kỳ</label>
        <input type="number" min=0 max=10 name="pointMidterm" id="pointMidterm" class="form-control">
        <p class="text-danger">@error('pointMidterm')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="pointCondition">Điểm điều kiện</label>
        <input type="number" min=0 max=10 name="pointCondition" id="pointCondition" class="form-control">
        <p class="text-danger">@error('pointCondition')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <div class="form-group">
        <label for="pointFinal">Điểm cuối kỳ</label>
        <input type="number" min=0 max=10 name="pointFinal" id="pointFinal" class="form-control">
        <p class="text-danger">@error('pointFinal')
            {{ $message }}
          @enderror</p>
        @isset($message)
          <p class="text-danger">{{ $message }}</p>
        @endisset
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
      <button onclick="history.back()" type="button" class="btn btn-primary">Quay lại</button>
  </div>
  </form>
  </div>
@endsection
