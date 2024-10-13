@extends('master')
@section('title')
    Cập nhật sinh viên
@endsection    
@section('content')
    <div class="container">
        <h1>Cập nhật sinh viên: {{$student->name}}</h1>
        @if (session()->has('success') && session()->get('success'))
        <div class="alert alert-success" role="alert">
            Thao tác thành công
        </div>
    @endif
        <div class="container">
            <form method="POST" action="{{route('students.update', $student->id)}}"> 
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="name" class="col-4 col-form-label">Name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" />
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email" value="{{$student->email}}" />
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="classroom_id" class="col-4 col-form-label">Classroom</label>
                    <div class="col-8">
                        <select class="form-select" name="classroom_id" id="classroom_id">
                            @foreach ($classrooms as $class)
                                <option value="{{ $class->id }}" {{ $student->classroom_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('classroom_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="passport_number" class="col-4 col-form-label">Passport Number</label>
                    <div class="col-8">    
                        <input type="text" name="passport_number" class="form-control" value="{{$student->passport->passport_number ?? ''}}">
                    </div>
                </div> 
                <div class="mb-3 row">
                    <label for="issued_date" class="col-4 col-form-label">Issued Date</label>
                    <div class="col-8">    
                        <input type="date" name="issued_date" class="form-control" value="{{$student->passport->issued_date ?? ''}}">
                    </div>
                </div>          
                <div class="mb-3 row">
                    <label for="expiry_date" class="col-4 col-form-label">Expiry Date</label>
                    <div class="col-8">
                        <input type="date" name="expiry_date" class="form-control" value="{{$student->passport->expiry_date ?? ''}}">
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
                <div class="mb-3 row">
                    <label for="subject_ids" class="col-4 col-form-label">New Subjects</label>
                    <div class="col-8">
                        <div class="mb-3 row">
                            <select multiple class="form-control" id="subjects" name="subject_ids[]">
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" 
                                        {{ in_array($subject->id, $student->subjects->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>   
                            @error('subject_ids') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
