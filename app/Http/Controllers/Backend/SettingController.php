<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = WebsiteSetting::first() ?? new WebsiteSetting();
        return view('backend.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'site_logo']);
        $settings = WebsiteSetting::first();

        // จัดการอัปโหลดรูป Logo
        if ($request->hasFile('site_logo')) {
            if ($settings && $settings->site_logo && File::exists(public_path($settings->site_logo))) {
                File::delete(public_path($settings->site_logo));
            }

            $file = $request->file('site_logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            
            $data['site_logo'] = 'uploads/settings/' . $filename;
        }

        WebsiteSetting::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'บันทึกการตั้งค่าเว็บไซต์เรียบร้อยแล้ว!');
    }
}