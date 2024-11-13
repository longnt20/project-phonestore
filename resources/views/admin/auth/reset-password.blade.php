@extends('admin.auth.masterLogin')
@section('title')
    Đặt lại mật khẩu
@endsection
@section('content')
<div class="wrapper">
    <form method="POST" action="{{route('password.update')}}">
        @csrf
      <h2 class="text-white">Đặt lại mật khẩu</h2>
      <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-field">
        <input type="email" id="email" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label>Enter new password</label>
      </div>
      <div class="input-field">
        <input type="password" id="password-confirm" name="password_confirmation" required>
        <label>Confirm password</label>
      </div>
      <button type="submit">Đặt lại mật khẩu</button>

    </form>
  </div>
@endsection