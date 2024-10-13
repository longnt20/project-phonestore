<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW= 'employees.';
    public function index()
    {
        //
        $data = Employee::latest('id')->paginate(5);
        $data->load('department','manager');
        // dd($data);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Department::latest('id')->paginate(5);
        $data2 = Manager::latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data','data2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'        => 'required|max:255',
            'last_name'         => 'required|max:255',
            'email'             => ['required','email','max:100',Rule::unique('employees')->ignore($employee->id ?? null)],
            'phone'             => ['required', 'string', 'max:20', Rule::unique('employees')->ignore($employee->id ?? null)],
            'date_of_birth'     => 'required|date|max:255',
            'hire_date'         => 'required|string|max:255',
            'salary'            => 'required|max:20',
            'is_active'         => Rule::in([0, 1]),
            'department_id'     => 'required|exists:departments,id', // Kiểm tra xem department_id có tồn tại trong bảng departments không
            'manager_id'        => 'required|exists:managers,id',   // Nếu có manager, kiểm tra xem manager_id có tồn tại trong bảng managers không
            'address'           => 'required|string|max:255',
            'profile_picture'   => 'nullable|image|max:2048',
        ]);
        
        try {
            // Xử lý upload file
            if ($request->hasFile('profile_picture')) {
               $data['profile_picture'] = $request->file('profile_picture')->store('employees', 'public'); 
            }
        
            // Tạo mới Employee
            Employee::query()->create($data);
       
            return redirect()->route('employees.index')->with('success', true);
        } catch (\Throwable $th) {
            // Xóa file nếu có l
            dd($th->getMessage());
            if (!empty($data['profile_picture'])) {
                Storage::disk('public')->delete($data['profile_picture']);
            }
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
                // ->with('trace', $th->getTraceAsString()); // Hiển thị chi tiết trace lỗi;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::latest('id')->paginate(5);
        $managers = Manager::latest('id')->paginate(5);
        return view('employees.edit', compact('employee','departments','managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'first_name'        => 'required|max:255',
            'last_name'         => 'required|max:255',
            'email'             => ['required','email','max:100',Rule::unique('employees')->ignore($employee->id ?? null)],
            'phone'             => ['required', 'string', 'max:20', Rule::unique('employees')->ignore($employee->id ?? null)],
            'date_of_birth'     => 'required|date|max:255',
            'hire_date'         => 'required|string|max:255',
            'salary'            => 'required|max:20',
            'is_active'         => Rule::in([0, 1]),
            'department_id'     => 'required|exists:departments,id', // Kiểm tra xem department_id có tồn tại trong bảng departments không
            'manager_id'        => 'required|exists:managers,id',   // Nếu có manager, kiểm tra xem manager_id có tồn tại trong bảng managers không
            'address'           => 'required|string|max:255',
            'profile_picture'   => 'nullable|image|max:2048',
        ]);
        try {
            $data['is_active'] = isset($data['is_active']) ? $data['is_active']:0;
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = $request->file('profile_picture')->store('employees', 'public'); 
             }
            //  dd($request->all());
            $employee->update($data);
            return redirect()
            ->route('employees.index')
            ->with('success', true);
        } catch (\Throwable $th) {
            if (!empty($data['profile_picture'])) {
                Storage::disk('public')->delete($data['profile_picture']);
            }
            dd($th->getMessage());
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()
            ->route('employees.index')
            ->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }
    public function forceDestroy(Employee $employee)
    {
        //xóa cứng
        try {
            $employee->forceDelete();
            return redirect()
            ->route('employees.index')
            ->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }
}
