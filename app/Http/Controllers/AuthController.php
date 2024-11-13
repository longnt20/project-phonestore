<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
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

            return redirect('/dashboard');
        }
        return redirect('/loginadmin')->withErrors(['login_failed' => 'Email hoặc mật khẩu không chính xác']);
    }
    public function logout()
    {
        Session::forget('user');
        cookie()->queue(cookie()->forget('remember_token'));

        return redirect('/');
    }
}
