<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        $data = request()->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255','unique:users'],
            'password'=>['required','string','min:6','confirmed'],
        ]);
        $user = User::create($data);
        $token = $user->createToken(env('SANCTUM_NAME'))->plainTextToken;
        return response()->json(['token'=>$token]);
    }
    public function login(){
        $data = request()->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $user = User::query()->firstWhere('email',$data['email']);
        if (!$user) {
            return response()->json([
                'message'=>'Không tồn tại email này'
            ],404);
        }
        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message'=>'Sai mật khẩu'
            ],400);
        }
        $token = $user->createToken(env('SANCTUM_NAME'))->plainTextToken;
        return response()->json(['token'=>$token]);
    }
    public function logout(Request $request){
        /**
         * @var User $user
         */
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
