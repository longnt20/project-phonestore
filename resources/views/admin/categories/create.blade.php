@extends('admin.layouts.master')
@section('title')
    Thêm mới loại hàng
@endsection
@section('content')
    <h1>Thêm mới loại hàng</h1>
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
   <div>
    <div class="mt-3 col-6">
        <label for="">ID</label>
        <input type="text" disabled class="form-control" >
    </div>
    <div class="mt-3 col-6">
        <label for="">Tên loại</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
 
   </div>
   <button type="submit" class="btn btn-primary mt-3 ms-3">Thêm</button>
    </form>
@endsection