<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthClientController extends Controller
{
    public function showRegisterForm()
    {
        return view('client.auth.register');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
     
            DB::table('users')->insert([
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('/login')->with('success', 'Đăng kí thành công, Vui lòng đăng nhập.');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return back()->with('success','Đăng kí thất bại')->with('errors',$th->getMessage());
        }
    }
    public function showLoginForm()
    {
        return view('client.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        $user = DB::table('users')->where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {

            Session::put('user', $user);


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

        return redirect('/');
    }
}
