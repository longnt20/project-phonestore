@extends('admin.layouts.master')
@section('title')
    Chi tiết người dùng
@endsection
@section('content')
<h1>Chi tiết người dùng : {{$user->name}}</h1>
<form method="post" enctype="multipart/form-data">
    @csrf
<div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Ảnh đại diện</label><br>
        <img src="{{Storage::url($user->image)}}" class="rounded-5" alt="" srcset="" width="200px">
    </div>
<div class="">
    <div class="mt-3 col-6">
        <label for="">Username</label>
        <input disabled type="text" name="username" class="form-control" value="{{$user->username}}" style="width:550px">
    </div>
    <div class="mt-3 col-6">
        <label for="">Password</label>
        <input disabled type="text" name="password" class="form-control" value="{{$user->password}}" style="width:550px">
    </div>
    <div class="mt-3 col-6">
        <label for="">Name</label>
        <input disabled type="text" name="name" class="form-control" value="{{$user->name}}" style="width:550px">
    </div>
    </div>
    
</div>
<div class="d-flex gap-3">
<div class="mt-3 col-6">
    <label for="">Phone</label>
    <input disabled type="text" name="phone" class="form-control" value="{{$user->phone}}">
</div>
<div class="mt-3 col-6">
    <label for="">Address</label>
    <input disabled type="text" name="address" class="form-control" value="{{$user->address}}">
</div>
</div>
<div class="d-flex gap-3">
<div class="mt-3 col-6">
    <label for="">Email</label>
    <input disabled type="email" name="email" class="form-control" value="{{$user->email}}">
</div>
<div class="mt-3 col-6">
    <label for="">Type</label>
    <select name="type" class="form-select w-25" disabled>
        <option value="admin" {{$user->type =='admin' ? 'selected':''}}>Admin</option>
        <option value="employee" {{$user->type =='employee' ? 'selected':''}}>Employee</option>
        <option value="client" {{$user->type =='client' ? 'selected':''}}>Client</option>
    </select>
</div>
</div>
</form>
@endsection