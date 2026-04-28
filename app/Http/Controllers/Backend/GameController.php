<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('backend.game-topup', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required',
            'api_key' => 'nullable|string',
        ]);

        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('assets/img'), $imageName);

        Game::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'assets/img/' . $imageName,
            'status' => $request->status,
            'api_key' => $request->api_key,
        ]);

        return redirect()->back()->with('success', 'เพิ่มเกมและตั้งค่า API เรียบร้อยแล้ว');
    }
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return response()->json($game);
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if (file_exists(public_path($game->image))) unlink(public_path($game->image));
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/img'), $imageName);
            $data['image'] = 'assets/img/' . $imageName;
        }

        $game->update($data);
        return redirect()->back()->with('success', 'แก้ไขข้อมูลเกมเรียบร้อยแล้ว');
    }
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        if (file_exists(public_path($game->image))) {
            unlink(public_path($game->image));
        }
        $game->delete();

        return redirect()->back()->with('success', 'ลบเกมเรียบร้อยแล้ว');
    }
}
