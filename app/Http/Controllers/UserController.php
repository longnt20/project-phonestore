<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest('id')->paginate(5);
        // dd($data);
        return view('admin.users.index', compact('data'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => ['required', 'min:6'],
            'email' => ['required', 'email', Rule::unique('users')],
            'phone' => ['required', 'max:10', Rule::unique('users')],
            'name' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048',
            'type' => ['required', Rule::in(['admin', 'employee', 'client'])],
        ]);
        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('image', 'public');
            }else {
                $imagePath = "";
            }
            DB::table('users')->insert([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $imagePath,
                'password' => Hash::make($request->password),
                'type' => $request->type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect('users')->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return back()->with('success', false)->with('errors', $th->getMessage());
        }
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => 'required|max:255',
            'password' => ['required', 'min:6'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'phone' => [
                'required',
                'max:10',
                Rule::unique('users')->ignore($user->id)
            ],
            'name' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048',
            'type' => ['required', Rule::in(['admin', 'employee', 'client'])],
        ]);
        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('image', 'public');
            } else {
                $imagePath = $user->image;
            }
            $data['password'] = Hash::make($request->password);
            $data['updated_at']= now();
            $data['image']= $imagePath;
            DB::table('users')
            ->where('id',$user->id)
            ->update($data);
            return redirect('users')->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return back()->with('success', false)->with('errors', $th->getMessage());
        }
    }
    public function destroy(User $user)
    {
        //xóa mềm
        try {
            User::query()
            ->where('id', $user->id)
            ->delete();
            return redirect()
            ->route('users.index')
            ->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('errors', $th->getMessage());
        }
    }
    public function profile()
    {
        $user_s = session('user');
        return view('admin.users.profile', compact('user_s'));
    }
}
