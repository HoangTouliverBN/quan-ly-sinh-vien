@extends('frontend.layout.index')

@section('content')
  <div class=" container mt-5 mb-5">
    <div class="d-flex justify-content-center alignt-items-center">
      <div class="loginForm ">
        <div class="d-flex justify-content-center">
          <h2 class="text-center mt-2 pb-2 loginContent">Quên mật khẩu</h2>
        </div>
        <form action="{{ url('password/forget') }}" method="POST" class="container">
          @csrf
          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Nhập địa chỉ email">
          </div>
          @error('email')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          @isset($error)
            <p class="text-danger">{{ $error }}</p>
          @endisset
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Gửi link đặt lại mật khẩu</button>
          </div>
          <div class="text-right mb-3">
            <a href="/" class="text-decoration-none">Đăng nhập?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
