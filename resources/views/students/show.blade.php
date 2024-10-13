@extends('master')
@section('title')
    Chi tiết sinh viên
@endsection
@section('content')
    <div class="container">
        <h1>Chi tiết sinh viên: {{$student->name}}</h1>
        <div class="container">
            <form>
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-4 col-form-label">Name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name" disabled value="{{$student->name}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email" disabled value="{{$student->email}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="classroom_id" class="col-4 col-form-label">Classroom</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name" disabled value="{{$student->classroom->name}}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="passport_number" class="col-4 col-form-label">Passport Number</label>
                    <div class="col-8">    
                        <input type="text" name="passport_number" class="form-control" disabled value="{{$student->passport->passport_number ?? ''}}">
                    </div>
                </div> 
                <div class="mb-3 row">
                    <label for="issued_date" class="col-4 col-form-label">Issued Date</label>
                    <div class="col-8">    
                        <input type="date" name="issued_date" class="form-control" disabled value="{{$student->passport->issued_date ?? ''}}">
                    </div>
                </div>          
                <div class="mb-3 row">
                    <label for="expiry_date" class="col-4 col-form-label">Expiry Date</label>
                    <div class="col-8">
                        <input type="date" name="expiry_date" class="form-control" disabled value="{{$student->passport->expiry_date ?? ''}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="subject_ids" class="col-4 col-form-label">Subjects</label>
                    <div class="col-8">
                        <ul>
                            @foreach ($student->subjects as $subject)
                                <li>{{ $subject->name }} ({{ $subject->credits }} credits)</li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </form>
        </div>

    </div>
@endsection
