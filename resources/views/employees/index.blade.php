@extends('master')
@section('title')
    Danh sách nhân viên
@endsection
@section('content')
    @if (session()->has('success') && session()->get('success'))
        <div class="alert alert-success" role="alert">
            Thao tác thành công
        </div>
    @endif
    <h1>Danh sách nhân viên</h1>
    <a class="btn btn-primary" href="{{ route('employees.create') }}" role="button">Thêm mới</a>

    <div class="">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First_name</th>
                        <th>Last_name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date_of_birth</th>
                        <th>Hire_date</th>
                        <th>Salary</th>
                        <th>Is_active</th>
                        <th>Department_id</th>
                        <th>Manager_id</th>
                        <th>Address</th>
                        <th>Profile_picture</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $employ)
                        <tr>
                            <td>{{ $employ->id }}</td>
                            <td>{{ $employ->first_name }}</td>
                            <td>{{ $employ->last_name }}</td>
                            <td>{{ $employ->email }}</td>
                            <td>{{ $employ->phone }}</td>
                            <td>{{ $employ->date_of_birth }}</td>
                            <td>{{ $employ->hire_date }}</td>
                            <td>{{ $employ->salary }}</td>
                            <td>
                                @if ($employ->is_active)
                                    <button class="btn btn-primary">

                                        <span class="badge bg-primary">Active</span>
                                    </button>
                                @else
                                    <button class="btn btn-danger">

                                        <span class="badge bg-danger">Inactive</span>
                                    </button>
                                @endif
                            </td>
                            <td>{{ $employ->department->department_name }}</td>
                            <td>{{ $employ->manager->manager_name }}</td>
                            <td>{{ $employ->address }}</td>
                            <td>
                                <img src="{{ Storage::url($employ->profile_picture) }}" alt="" srcset=""
                                    width="100">
                            </td>
                            <td>{{ $employ->created_at }}</td>
                            <td>{{ $employ->updated_at }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{ route('employees.show', $employ->id) }}"
                                    role="button">Show</a>
                                <form action="{{ route('employees.destroy', $employ->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-warning my-2" role="button">XóaM</button>
                                </form>
                                <form action="{{route('employees.forceDestroy', $employ->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">XóaC</button>
                                </form>

                                    <a class="btn btn-success my-2" href="{{ route('employees.edit', $employ->id) }}"
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
