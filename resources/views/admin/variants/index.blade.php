@extends('admin.layouts.master')
@section('title')
    Danh sách sản phẩm biến thể
@endsection
@section('content')
    <div class="container">
        <h1>Danh sách sản phẩm biến thể</h1>
        @if (session()->has('success') && session()->get('success'))
            <div class="alert alert-success" role="alert">
                Thao tác thành công
            </div>
        @endif
    @if (session()->has('success') && !session()->get('success'))
        <div class="alert alert-danger" role="alert">
            <strong>Thao tác không thành công</strong>
            {{ session()->get('error') }}
        </div>
    @endif
        <a name="" id="" class="btn btn-primary mb-2" href="{{ route('variants.create') }}" role="button">Thêm
            mới</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Attribute_name</th>
                        <th>Attribute_value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $pro)
                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td>{{ $pro->variant->product->name }}</td> 
                            @php
                            $images = json_decode($pro->variant->product->image, true);  
                            @endphp
                            <td>
                                @if (is_array($images) && !empty($images))
                                        <img src="{{Storage::url($images[0])}}" alt="" srcset="" width="80px">
                                @endif    
                            </td> 
                            <td>
                               {{$pro->variant->price}}
                            </td>
                            <td>{{ $pro->variant->quantity }}</td>
                            <td>{{$pro->attribute_value->attribute->name}}</td>
                            <td>{{$pro->attribute_value->value}}</td>
                            <td>
                               <div class="d-flex gap-3">
                                <a class="btn btn-primary"
                                href="{{ route('variants.show',$pro->id) }}" role="button">Show</a>
                            <a name="" id="" class="btn btn-success"
                                href="{{ route('variants.edit', $pro->id) }}" role="button">Sửa</a>
                                <form action="{{route('variants.destroy',$pro->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa không ?')" type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                               </div>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
@endsection
