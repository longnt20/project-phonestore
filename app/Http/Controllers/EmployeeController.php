<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'        =>'required|max:255',
            'last_name'         =>'required|email|max:100',
            'email'             =>'required|max:255',
            'profile_picture'   =>'nullable|image|max:2048',
            'phone'             =>['required','string','max:20',Rule::unique('employees')],
            'date_of_birth'     =>'required|date|max:255',               
            'hire_date'         =>'required|datetime|max:255',               
            'salary'            =>'required|int|max:20',    
            'is_active'         =>['null', Rule::in([0,1])],
            'address'           =>'required|max:255',
        ]);
        try {
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture']=Storage::put('employees',$request->file('profile_picture'));
            }
            Employee::query()->create($data);
            return redirect()->route('employees.index')->with('success', true);
        } catch (\Throwable $th) {
            if (!empty( $data['profile_picture']) && Storage::exists( $data['profile_picture'])) {
                Storage::delete( $data['profile_picture']);
            }
            return back()
            ->with('success', false)
            ->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
