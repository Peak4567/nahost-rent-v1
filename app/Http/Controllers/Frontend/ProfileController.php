<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('frontend.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'ไม่พบข้อมูลผู้ใช้งาน']);
        }

        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลส่วนตัวเรียบร้อยแล้วครับ');
    }
}
