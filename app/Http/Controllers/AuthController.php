<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function store(Request $request)
    {
       try {
         // Kiểm tra email trùng lặp
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        // Mã hóa mật khẩu và lưu vào CSDL
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return redirect('/login')->with('success', 'Đăng kí thành công, Vui lòng đăng nhập.');
       } catch (\Throwable $th) {
        //throw $th;
        dd($th->getMessage());
        return back();
       }
    }
    public function showLoginForm()
{
    return view('login');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Kiểm tra email và mật khẩu
    $user = DB::table('users')->where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        // Đăng nhập thành công
        Session::put('user', $user);

        // Lưu Remember Token nếu người dùng chọn
        if ($request->has('remember')) {
            $rememberToken = bin2hex(random_bytes(30));
            DB::table('users')->where('id', $user->id)->update(['remember_token' => $rememberToken]);
            cookie()->queue('remember_token', $rememberToken, 60 * 24 * 30); // Lưu token trong cookie
        }

        return redirect('/');
    }

    return redirect('/login')->withErrors(['login_failed' => 'Email hoặc mật khẩu không chính xác']);
}
public function logout()
{
    Session::forget('user');
    cookie()->queue(cookie()->forget('remember_token'));

    return redirect('/login');
}

}
