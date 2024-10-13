@extends('master')
@section('title')
    Thêm mới sinh viên
@endsection
@section('content')
    <div class="container">
        <h1>Thêm mới sinh viên</h1>
        <div class="container">
            <form method="POST" action="{{route('students.store')}}">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-4 col-form-label">Name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name" {{old('name')}} />
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email" {{old('email')}} />
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="classroom_id" class="col-4 col-form-label">Classroom</label>
                    <div class="col-8">
                        <select name="classroom_id" class="form-control">
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="passport_number" class="col-4 col-form-label">Passport Number</label>
                    <div class="col-8">    
                        <input type="text" name="passport_number" class="form-control" value="{{ old('passport_number') }}">
                    </div>
                </div> 
                <div class="mb-3 row">
                    <label for="issued_date" class="col-4 col-form-label">Issued Date</label>
                    <div class="col-8">    
                        <input type="date" name="issued_date" class="form-control" value="{{ old('issued_date') }}">
                    </div>
                </div>          
                <div class="mb-3 row">
                    <label for="expiry_date" class="col-4 col-form-label">Expiry Date</label>
                    <div class="col-8">
                        <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="subject_ids" class="col-4 col-form-label">Subjects</label>
                    <div class="col-8">
                        <select name="subject_ids[]" class="form-control" multiple>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->credits }} tín chỉ)</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">
                            Thêm mới
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
