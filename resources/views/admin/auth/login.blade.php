@extends('admin.auth.masterLogin')
@section('title')
    Đăng nhập
@endsection
@section('content')
<div class="wrapper">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->has('login_failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $errors->first('login_failed') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <form method="POST" action="{{route('loginadmin')}}">
        @csrf
      <h2 class="text-white">Đăng nhập admin</h2>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Nhập email của bạn</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Mật khẩu</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Lưu mật khẩu</p>
        </label>
        <a href="/forgot-password">Quên mật khẩu?</a>
      </div>
      <button type="submit">Đăng nhập</button>
    </form>
  </div>
@endsection