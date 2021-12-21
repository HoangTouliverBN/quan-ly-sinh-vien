@extends('frontend.layout.index')

@section('content')
  <div class=" container mt-5 mb-5">
    <div class="d-flex justify-content-center alignt-items-center">
      <div class="loginForm ">
        <div class="d-flex justify-content-center">
          <h2 class="text-center mt-2 pb-2 loginContent">Đăng nhập</h2>
        </div>
        <form action="{{url('login')}}" method="POST" class="container">
          @csrf
          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập địa chỉ email">
          </div>

          <div class="mb-3 mt-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password"  class="form-control" id="password" placeholder="Nhập mật khẩu">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
          </div>
          <div class="text-end mb-3">
            <a href="#" class="text-decoration-none">Quên mật khẩu?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
