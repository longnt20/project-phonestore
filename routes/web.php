<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IphoneController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthClient;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('authCheck')->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
    Route::resource('users', UserController::class);
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
});

Route::get('/', function () {
    return view('client.HomePage');
});
//Route Đăng nhập admin
Route::get('/loginadmin', [AuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/loginadmin', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//Route Đăng nhập,đăng kí client
Route::get('/register', [AuthClientController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthClientController::class, 'store']);
Route::get('/login', [AuthClientController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthClientController::class, 'login']);
Route::post('/logout', [AuthClientController::class, 'logout'])->name('logout');
//Route quên mật khẩu
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
