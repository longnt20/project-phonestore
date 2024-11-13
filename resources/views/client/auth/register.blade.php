@extends('client.auth.masterLogin')
@section('title')
    Đăng kí
@endsection
@section('content')
    <div class="wrapper">



        <div class="mt-3">
            <img src="client/image/logoHaMa.png" alt="" style="width:100px; margin-left: 600px;">
            <p class="fs-4 text-center">Đăng ký L-member</p>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 350px;width:630px">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" style="margin-left: 350px">
                @csrf
                <div class="mb-3 justify-content-center">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control w-65">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                  <input type="text" name="phone" class="form-control w-65">
                  @error('phone')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control w-65" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                        @error('email')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" min="6" class="form-control w-65" id="exampleInputPassword1" required>
                </div>
                <button type="submit" class="btn btn-primary">Đăng kí</button>
              </form>
              <p class="mt-3" style="margin-left: 350px;">Bạn đã có tài khoản ? <a class="text-decoration-none text-danger fw-semibold" href="/login">Đăng nhập ngay</a></p>
        </div>
        </form>
    </div>
@endsection
