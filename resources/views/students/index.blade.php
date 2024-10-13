@extends('master')
@section('title')
    Danh sách sinh viên
@endsection
@section('content')
    <div class="container">
        @if (session()->has('success') && session()->get('success'))
        <div class="alert alert-success" role="alert">
            Thao tác thành công
        </div>
    @endif
   
        <h1>Danh sách sinh viên</h1>
        <form action="{{ route('students.index') }}" method="GET" class="mb-3">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request('name') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <a name="" id="" class="btn btn-primary my-2" href="{{ route('students.create') }}" role="button">Thêm
            mới</a>

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Classroom_id</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->classroom->name }}</td>
                            <td>{{ $student->created_at }}</td>
                            <td>{{ $student->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('students.show', $student->id) }}"
                                    role="button">Show</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa không ?')" type="submit" class="btn btn-danger my-2">
                                        Xóa
                                    </button>
                                </form>
                                    <a class="btn btn-success" href="{{ route('students.edit', $student->id) }}"
                                        role="button">Sửa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>

    </div>
@endsection
