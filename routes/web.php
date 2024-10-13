<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Models\Employee;
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

Route::get('/', function () {
    // $users = DB::table('users')->get();
 
// foreach ($users as $user) {
//     dd($users->toArray());
// }
    return view('master');
})->middleware('authCheck');
Route::resource('employees', EmployeeController::class);
Route::delete('employees/{employee}/forceDestroy',[EmployeeController::class, 'forceDestroy'])
->name('employees.forceDestroy');
Route::resource('students', StudentController::class);
Route::get('/movie', function () {
    return view('master');
})->middleware('checkAge');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');