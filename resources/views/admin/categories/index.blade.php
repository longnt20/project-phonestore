@extends('admin.layouts.master')
@section('title')
    Danh sách loại hàng
@endsection
@section('content')
    <div class="container">
        <h1>Danh sách loại hàng</h1>
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
        <a name="" id="" class="btn btn-primary mb-2" href="{{ route('categories.create') }}" role="button">Thêm
            mới</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>{{$cate->created_at}}</td>
                            <td>{{$cate->updated_at}}</td>
                            <td>
                               <div class="d-flex gap-3">
                            <a name="" id="" class="btn btn-success"
                                href="{{ route('categories.edit', $cate->id) }}" role="button">Sửa</a>
                                <form action="{{route('categories.destroy',$cate->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
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
