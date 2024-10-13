<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Trong controller xử lý giao dịch
public function startTransaction(Request $request)
{
    $transactionId = uniqid('txn',true); // Tạo một UUID cho phiên giao dịch
    $sessionData = [
        'transaction_id' => $transactionId,
        'amount' => $request->input('amount'),
        'target_account' => $request->input('target_account'),
        'steps_completed' => [],
        'status' => 'in_progress',
    ];

    // Lưu dữ liệu vào session
    session(['transaction' => $sessionData]);

    return response()->json(['message' => 'Transaction started', 'transaction_id' => $transactionId]);
}
public function updateTransactionStep(Request $request)
{
    $sessionData = session('transaction');

    if (!$sessionData) {
        return response()->json(['message' => 'No active transaction found'], 404);
    }

    // Cập nhật bước hoàn thành
    $sessionData['steps_completed'][] = $request->input('step');
    session(['transaction' => $sessionData]);

    return response()->json(['message' => 'Transaction step updated']);
}
public function completeTransaction()
{
    $sessionData = session('transaction');

    if (!$sessionData) {
        return response()->json(['message' => 'No active transaction found'], 404);
    }

    // Lưu thông tin vào cơ sở dữ liệu
    // TransactionController::create([
    //     'transaction_id' => $sessionData['transaction_id'],
    //     'amount' => $sessionData['amount'],
    //     'target_account' => $sessionData['target_account'],
    //     'status' => 'completed',
    // ]);

    // Xóa thông tin phiên giao dịch khỏi session
    session()->forget('transaction');

    return response()->json(['message' => 'Transaction completed successfully']);
}

public function cancelTransaction()
{
    // Xóa thông tin phiên giao dịch khỏi session
    session()->forget('transaction');

    return response()->json(['message' => 'Transaction canceled']);
}




}
