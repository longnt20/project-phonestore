<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')
->group(function(){
    Route::get('/user',function(Request $request){
        return $request->user();
      
    });
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


// Khởi tạo phiên giao dịch
Route::post('/start-transaction', [TransactionController::class, 'startTransaction']);

// Cập nhật trạng thái giao dịch
Route::post('/update-transaction-step', [TransactionController::class, 'updateTransactionStep']);

// Hoàn thành giao dịch
Route::post('/complete-transaction', [TransactionController::class, 'completeTransaction']);

// Hủy giao dịch
Route::post('/cancel-transaction', [TransactionController::class, 'cancelTransaction']);

