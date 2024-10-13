<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::query();
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('classroom_id')) {
            $query->where('classroom_id', $request->id);
        }
        $data = $query->with(['classroom','subjects','passport'])->latest('id')->paginate(5);

        // Truyền thêm danh sách classrooms để hiển thị trong form tìm kiếm
        $classrooms = Classroom::all();

        return view('students.index', compact('data', 'classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('students.create', compact('classrooms', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('students')->ignore('students')],
            'classroom_id' => 'required|exists:classrooms,id'
        ]);
        // dd($validated);
        $student = Student::create($validated);

        // Thêm hộ chiếu
        if ($request->has('passport_number')) {
            $student->passport()->create([
                'passport_number' => $request->passport_number,
                'issued_date' => $request->issued_date,
                'expiry_date' => $request->expiry_date,
            ]);
        }

        // Đăng ký môn học
        if ($request->has('subject_ids')) {
            $student->subjects()->attach($request->subject_ids);
        }
        return redirect()->route('students.index')->with('success', 'Student created successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student','classrooms', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('students')->ignore($student->id)],
            'classroom_id' => 'required|exists:classrooms,id',
        ]);
        // dd($validated);
        // Cập nhật hộ chiếu
        if ($request->has('passport_number')) {
            $student->passport()->update([
                'passport_number' => $request->passport_number,
                'issued_date' => $request->issued_date,
                'expiry_date' => $request->expiry_date,
            ]);
        }

        // Đăng ký thêm môn học
        if ($request->has('subject_ids')) {
            $existingSubjects = $student->subjects()->pluck('subject_id')->toArray();
            $newSubjects = array_diff($request->subject_ids, $existingSubjects);
    
            if (!empty($newSubjects)) {
                $student->subjects()->attach($newSubjects);
            }
        }
        // dd($validated);
        $student->update($validated);
        return redirect()->route('students.edit',$student->id)->with('success', 'Student created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('students.index')->with('success', true);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }
    public function searchByNameOrClass(Request $request){
        // dd($request->all());
        $query = Student::query();
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('classroom_id')) {
            $query->where('classroom_id', $request->id);
        }
        $data = $query->with('classroom')->latest('id')->paginate(5);

        // Truyền thêm danh sách classrooms để hiển thị trong form tìm kiếm
        $classrooms = Classroom::all();

        return view('students.index', compact('data', 'classrooms'));
    }
}
