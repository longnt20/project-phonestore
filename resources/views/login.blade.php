@extends('masterLogin')
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

    <form method="POST" action="{{route('login')}}">
        @csrf
      <h2 class="text-white">Login</h2>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Login</button>
      <a href="{{route('register')}}">Register</a>
    </form>
  </div>
@endsection