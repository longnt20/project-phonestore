@extends('admin.layouts.master')
@section('title')
    Danh sách người dùng
@endsection
@section('content')
    <div class="container">
        <h1>Danh sách người dùng</h1>
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
        <a name="" id="" class="btn btn-primary mb-2" href="{{ route('users.create') }}" role="button">Thêm
            mới</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->type == 'admin')
                                    <button class="btn btn-danger">
                                        <span class="badge bg-danger">Admin</span>
                                    </button>
                                @endif
                                @if ($user->type == 'employee')
                                    <button class="btn btn-warning">
                                        <span class="badge bg-warning">Employee</span>
                                    </button>
                                @endif
                                @if ($user->type == 'client')
                                <button class="btn btn-primary">
                                    <span class="badge bg-primary">Client</span>
                                </button>
                            @endif
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                               <div class="d-flex gap-3">
                                <a name="" id="" class="btn btn-primary"
                                href="{{ route('users.show', $user->id) }}" role="button">Show</a>
                            <a name="" id="" class="btn btn-success"
                                href="{{ route('users.edit', $user->id) }}" role="button">Sửa</a>
                                @if ($user->type == 'client' || $user->type == 'employee')
                                <form action="{{route('users.destroy',$user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                                @endif
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
