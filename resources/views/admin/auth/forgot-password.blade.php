@extends('admin.auth.masterLogin')
@section('title')
    Quên mật khẩu
@endsection
@section('content')
<div class="wrapper">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <form method="POST" action="{{route('password.email')}}">
        @csrf
      <h2 class="text-white">Quên mật khẩu</h2>
        <div class="input-field">
        <input type="email" id="email" name="email" required>
        <label>Enter your email</label>
      </div>
     
      <button type="submit">Gửi</button>
      <a href="/login" class="text-white mt-3">Quay lại trang đăng nhập</a>
    </form>
  </div>
@endsection