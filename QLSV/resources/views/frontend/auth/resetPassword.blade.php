@extends('frontend.layout.index')

@section('content')
  <div class=" container mt-5 mb-5">
    <div class="d-flex justify-content-center alignt-items-center">
      <div class="loginForm ">
        <div class="d-flex justify-content-center">
          <h2 class="text-center mt-2 pb-2 loginContent">Quên mật khẩu</h2>
        </div>
        <form action="{{ url('password/reset/'.$token) }}" method="POST" class="container">
          @csrf
          <div class="div-password mt-3 mb-3">
            <div class="form-group">
              <label for="password">Mật khẩu mới:</label>
              <input type="password" id="password" name="password" class="form-control">
              @error('password')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="confirm-password">Nhập lại mật khẩu:</label>
              <input type="password" id="confirm-password" name="confirm-password" class="form-control">
              @error('confirm-password')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
          </div>
          <div class="text-right mb-3">
            <a href="/" class="text-decoration-none">Đăng nhập?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
