@extends('client.auth.masterLogin')
@section('title')
    Đăng nhập
@endsection
@section('content')
    <div class="wrapper">
        <div class="mt-3">
            <img src="client/image/logoHaMa.png" alt="" style="width:100px; margin-left: 600px;">
            <p class="fs-4 text-center">Đăng nhập L-member</p>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('login_failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left: 350px;width:630px">
                    {{ $errors->first('login_failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" style="margin-left: 350px">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control w-65" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control w-65" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="exampleCheck1">Lưu mật khẩu</label>
                    <a href="/forgot-password" style="margin-left: 380px;text-decoration:none">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="btn btn-primary mb-1">Đăng nhập</button>
                <p class="mt-3" style="">Bạn chưa có tài khoản ? <a
                        class="text-decoration-none text-danger fw-semibold" href="/register">Đăng kí ngay</a></p>
        </div>
        </form>
    </div>
@endsection
