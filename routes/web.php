<?php

use App\Http\Controllers\EmployeeController;
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
    $users = DB::table('users')->get();
 
foreach ($users as $user) {
    dd($users->toArray());
}
    return view('welcome');
});
Route::resource('employees', EmployeeController::class);
Route::delete('employees/{employee}/forceDestroy',[EmployeeController::class, 'forceDestroy'])
->name('employees.forceDestroy');
