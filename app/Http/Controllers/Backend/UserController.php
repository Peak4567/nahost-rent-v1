<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'level'    => 'required|in:member,admin',
            'points'   => 'required|numeric|min:0',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name'   => $request->name,
            'email'  => $request->email,
            'level'  => $request->level,
            'points' => $request->points,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('backend.users')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'ไม่สามารถลบบัญชีตัวเองได้');
        }

        $user->delete();
        return redirect()->route('backend.users')->with('success', 'ลบผู้ใช้งานสำเร็จ');
    }
}