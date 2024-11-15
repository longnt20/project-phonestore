@extends('admin.layouts.master')
@section('title')
    Cập nhật loại hàng
@endsection
@section('content')
    <h1>Cập nhật loại hàng</h1>
    <form action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   <div>
    <div class="mt-3 col-6">
        <label for="">ID</label>
        <input type="text" disabled class="form-control" >
    </div>
    <div class="mt-3 col-6">
        <label for="">Tên loại</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}">
            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror
    </div>  
 
   </div>
   <button type="submit" class="btn btn-primary mt-3 ms-3">Cập nhật </button>
    </form>
@endsection