@extends('admin.layouts.master')
@section('title')
    Thêm mới người dùng
@endsection
@section('content')
    <h1>Thêm mới người dùng</h1>
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" value="{{old('username')}}">
        @error('username')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" value="{{old('password')}}">
        @error('password')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
        @error('phone')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Address</label>
        <input type="text" name="address" class="form-control" value="{{old('address')}}">
        @error('address')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Ảnh đại diện</label>
        <input type="file" name="image" class="form-control" value="{{old('image')}}">
        @error('image')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}">
        @error('email')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Type</label>
        <select name="type" class="form-select w-25">
            <option value="admin" {{old('type') =='admin' ? 'selected':''}}>Admin</option>
            <option value="employee" {{old('type') =='employee' ? 'selected':''}}>Employee</option>
            <option value="client" {{old('type') =='client' ? 'selected':''}}>Client</option>
        </select>
        @error('type')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <button type="submit" class="btn btn-primary mt-3 ms-3">Thêm</button>
    </form>
@endsection