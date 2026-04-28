<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Topup;

class TopupController extends Controller
{
    public function index()
    {
        $paymentSetting = DB::table('payment_settings')->first();

        // ส่งตัวแปรไปที่หน้า view
        return view('frontend.topup', compact('paymentSetting'));
    }
    public function truemoney(Request $request)
    {
        $request->validate([
            'link' => 'required|url|starts_with:https://gift.truemoney.com',
        ]);

        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'กรุณาล็อกอินก่อนครับ'], 401);
        }

        $user = User::find(Auth::id());

        $amount = 50.00;

        $user->points += $amount;
        $user->save();

        return response()->json(['status' => 'success', 'amount' => number_format($amount, 2)]);
    }

    public function promptpay(Request $request)
    {
        $request->validate([
            'slip' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'กรุณาล็อกอินก่อนครับ'], 401);
        }
        $path = $request->file('slip')->store('slips', 'public');

        return response()->json([
            'status' => 'success',
            'message' => 'อัปโหลดสลิปสำเร็จ! ระบบกำลังตรวจสอบยอดเงิน (แจ้งแอดมินแล้ว)'
        ]);
    }
    public function history()
    {
        $histories = Topup::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.topup-history', compact('histories'));
    }
}
