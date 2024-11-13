@extends('admin.layouts.master')
@section('title')
    Cập nhật người dùng
@endsection
@section('content')
<h1>Cập nhật người dùng : {{$user->name}}</h1>
<form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Ảnh đại diện</label><br>
        <img src="{{Storage::url($user->image)}}" class="rounded-5" alt="" srcset="" width="200px">
        <input type="file" name="image" class="form-control" style="width:200px">
        @error('image')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
<div class="">
    <div class="mt-3 col-6">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" value="{{$user->username}}" style="width:550px">
        @error('username')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Password</label>
        <input type="text" name="password" class="form-control" value="{{$user->password}}" style="width:550px">
        @error('password')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" style="width:550px">
        @error('name')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    </div>
    
</div>
<div class="d-flex gap-3">
<div class="mt-3 col-6">
    <label for="">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
    @error('phone')
    <div class="text-danger">{{$message}}</div>
@enderror
</div>
<div class="mt-3 col-6">
    <label for="">Address</label>
    <input type="text" name="address" class="form-control" value="{{$user->address}}">
    @error('address')
    <div class="text-danger">{{$message}}</div>
@enderror
</div>
</div>
<div class="d-flex gap-3">
<div class="mt-3 col-6">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control" value="{{$user->email}}">
    @error('email')
    <div class="text-danger">{{$message}}</div>
@enderror
</div>
<div class="mt-3 col-6">
    <label for="">Type</label>
    <select name="type" class="form-select w-25">
        <option value="admin" {{$user->type =='admin' ? 'selected':''}}>Admin</option>
        <option value="employee" {{$user->type =='employee' ? 'selected':''}}>Employee</option>
        <option value="client" {{$user->type =='client' ? 'selected':''}}>Client</option>
    </select>
    @error('type')
    <div class="text-danger">{{$message}}</div>
@enderror
</div>
</div>
<button type="submit" class="btn btn-primary mt-3 ms-3">Cập nhật</button>
</form>
@endsection