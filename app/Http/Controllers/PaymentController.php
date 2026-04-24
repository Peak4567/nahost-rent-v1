<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function redeemVoucher(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $link = $request->input('link');
        $receiverMobile = '0922503217'; 

        // 1. ส่งงานไปให้ Node.js API (บอทที่เราเขียนไว้) จัดการ
        try {
            $response = Http::timeout(20)->post('http://localhost:3000/api/redeem', [
                'link' => $link,
                'phone' => $receiverMobile
            ]);

            $result = $response->json();

            // 2. ถ้า Node.js บอกว่าสำเร็จ
            if (isset($result['status']) && $result['status'] === 'success') {
                
                // *หมายเหตุ: ตอนนี้บอทยังไม่ได้ดึงยอดเงินจริงกลับมา เราจะตั้งค่ายอดเงินเริ่มต้นไว้ก่อน
                // พีคต้องไปเขียนโค้ดฝั่ง Node.js ให้ดึง Text จาก DOM มาใส่ในอนาคต
                $amount = 10; // สมมติยอดเงินไปก่อน
                
                $userId = Auth::id(); 
                if ($userId) {
                    \App\Models\User::where('id', $userId)->increment('points', $amount);
                    $newBalance = \App\Models\User::where('id', $userId)->value('points');
                    
                    return response()->json([
                        'status' => 'success',
                        'message' => 'เติมเงินสำเร็จ',
                        'amount' => $amount,
                        'new_balance' => $newBalance
                    ]);
                }
            }

            // ถ้าไม่สำเร็จ
            return response()->json([
                'status' => 'error',
                'message' => $result['message'] ?? 'รับซองไม่สำเร็จ'
            ], 400);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'ไม่สามารถเชื่อมต่อกับบอท Node.js ได้'
            ], 500);
        }
    }
}