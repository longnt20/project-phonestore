@extends('master')
@section('title')
    Chi tiết khách hàng
@endsection
@section('content')
     <div class="container">
        <h1>Chi tiết khách hàng:  {{$employee->first_name}}</h1>
        <div class="container">
            <form method="POST" action="{{route('employees.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="first_name" class="col-4 col-form-label">First_name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="first_name" id="first_name" disabled value="{{$employee->first_name}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name" class="col-4 col-form-label">Last_name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="last_name" id="last_name" disabled value="{{$employee->last_name}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email" disabled value="{{$employee->email}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-4 col-form-label">Phone</label>
                    <div class="col-8">
                        <input type="tel" class="form-control" name="phone" id="phone" disabled value="{{$employee->phone}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date_of_birth" class="col-4 col-form-label">Date_of_birth</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" disabled value="{{$employee->date_of_birth}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="hire_date" class="col-4 col-form-label">Hire_date</label>
                    <div class="col-8">
                        <input type="dateTime" class="form-control" name="hire_date" id="hire_date" disabled value="{{$employee->hire_date}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="salary" class="col-4 col-form-label">Salary</label>
                    <div class="col-8">
                        <input type="int" class="form-control" name="salary" id="salary" disabled value="{{$employee->salary}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="is_active" class="col-4 col-form-label">Is_active</label>
                    <div class="col-8">
                        <input type="checkbox" class="form-checkbox" name="is_active" id="is_active" disabled value="{{$employee->is_active}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="department_id" class="col-4 col-form-label">Department_id</label>
                    <div class="col-8">
                      
                        <select class="form-select" name="department_id" id="department_id" disabled value="{{$employee->department->department_name}}">
                            <option value="">{{$employee->department->department_name}}</option>    
                        </select>
                       
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="manager_id" class="col-4 col-form-label">Manager_id</label>
                    <div class="col-8">
                      
                        <select class="form-select" name="manager_id" id="manager_id" disabled value="{{$employee->manager->manager_name}}">               
                            <option value="">{{$employee->manager->manager_name}}</option>
                        </select>
                       
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-4 col-form-label">Address</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="address" id="address" disabled value="{{$employee->address}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="profile_picture" class="col-4 col-form-label">Profile_picture</label>
                    <div class="col-8">
                        <img src="{{Storage::url($employee->profile_picture)}}" alt="" width="100">
                    </div>
                </div>
            </form>
        </div>
     </div>

@endsection