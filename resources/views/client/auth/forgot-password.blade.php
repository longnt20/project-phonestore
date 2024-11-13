@extends('client.auth.masterLogin')
@section('title')
    Quên mật khẩu
@endsection
@section('content')
    <div class="wrapper">
        <div class="mt-3">
            <img src="client/image/logoHaMa.png" alt="" style="width:100px; margin-left: 600px;">
            <p class="fs-4 text-center">Quên mật khẩu</p>
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 350px;width:630px">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@error('email')
<div class="alert alert-danger" style="margin-left: 350px;width:630px">{{ $message }}</div>
 @enderror
    <form method="POST" action="{{route('password.email')}}" style="margin-left: 350px">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control w-65" id="exampleInputEmail1"
              aria-describedby="emailHelp" required>
           
      </div>
     
      <button type="submit" class="btn btn-primary mb-1">Gửi</button>
      <a href="/login" class="text-danger mt-3 text-decoration-none" style="margin-left: 400px">Quay lại trang đăng nhập</a>
    </form>
  </div>
@endsection