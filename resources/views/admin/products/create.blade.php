@extends('admin.layouts.master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <h1>Thêm mới sản phẩm</h1>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Active</label>
        <select name="is_active" class="form-control" value="1">
            <option value="5">Tất cả</option>
            <option value="1">Active</option>
            <option value="0">InActive</option>
        </select>
        @error('is_active') 
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>  
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Category</label>
        
        <select name="category_id" class="form-control" value="{{old('category_id')}}">
            <option value="0">Tất cả</option>
            @foreach ($data as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>   
       
        @error('category_id')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control" value="{{old('image')}}">
        @error('image')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <div class="d-flex gap-3">
   
    <div class="mt-3 ms-3">
        <label for="">Description</label>
        <textarea id="content" name="description" class="form-control" value="{{old('description')}}"></textarea>
        @error('description')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <button type="submit" class="btn btn-primary mt-3 ms-3">Thêm</button>
    </form>
@endsection