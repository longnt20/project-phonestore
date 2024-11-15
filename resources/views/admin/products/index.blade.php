@extends('admin.layouts.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
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
        <a name="" id="" class="btn btn-primary mb-2" href="{{ route('products.create') }}" role="button">Thêm
            mới</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Active</th>
                        <th>Category</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $pro)
                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td>{{ $pro->name }}</td> 
                            <td>
                                <img src="{{Storage::url($pro->image)}}" alt="" srcset="" width="80px">
                            </td> 
                            <td>
                                @if ($pro->is_active)
                                    <button class="btn btn-primary">
                                        <span class="badge bg-primary">Active</span>
                                    </button>
                                @else 
                                <button class="btn btn-danger">
                                    <span class="badge bg-danger">InActive</span>
                                </button>
                                @endif
                            </td>
                            <td>{{ $pro->Category->name }}</td> 
                            <td>{{$pro->created_at}}</td>
                            <td>{{$pro->updated_at}}</td>
                            <td>
                               <div class="d-flex gap-3">
                                <a class="btn btn-primary"
                                href="{{ route('products.show',$pro->id) }}" role="button">Show</a>
                            <a name="" id="" class="btn btn-success"
                                href="{{ route('products.edit', $pro->id) }}" role="button">Sửa</a>
                                <form action="{{route('products.destroy',$pro->id)}}" method="post">
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
