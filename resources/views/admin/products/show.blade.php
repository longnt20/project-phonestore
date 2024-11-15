@extends('admin.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    <h1>Chi tiết sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Name</label>
        <input disabled type="text" name="name" class="form-control" value="{{$product->name}}">
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Active</label>
        <select disabled name="is_active" class="form-control">
            <option value="1" <?php echo $product->is_active ==1 ? 'selected': ''?>>Active</option>
            <option value="0" <?php echo $product->is_active ==0 ? 'selected': ''?>>InActive</option>
        </select>
        @error('is_active') 
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>  
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Category</label>
        
        <select disabled name="category_id" class="form-control">
            @foreach ($data as $cate)
            @if ($cate->id == $product->category_id)
            <option value="{{$product->category_id}}">{{$cate->name}}</option>
            @endif
            @endforeach
        </select>   
       
        @error('category_id')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Image</label><br>
        <img src="{{Storage::url($product->image)}}" alt="" srcset="" width="200px">
        @error('image')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 ms-3">
        <label for="">Description</label>
        <textarea id="content" name="description" class="form-control" value="{!!$product->description!!}"></textarea>
        @error('description')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
    </form>
@endsection