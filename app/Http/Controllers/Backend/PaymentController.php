<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaymentController extends Controller
{
    public function edit()
    {
        $settings = PaymentSetting::first() ?? new PaymentSetting();
        return view('backend.payment-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'bank_qr_code']);
        
        $settings = PaymentSetting::first();

        if ($request->hasFile('bank_qr_code')) {
            if ($settings && $settings->bank_qr_code && File::exists(public_path($settings->bank_qr_code))) {
                File::delete(public_path($settings->bank_qr_code));
            }

            $file = $request->file('bank_qr_code');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/payments'), $filename);
            
            $data['bank_qr_code'] = 'uploads/payments/' . $filename;
        }

        PaymentSetting::updateOrCreate(
            ['id' => 1], 
            $data
        );

        return redirect()->back()->with('success', 'อัปเดตการตั้งค่าช่องทางชำระเงินเรียบร้อยแล้ว!');
    }
}