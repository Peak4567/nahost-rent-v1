<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->main_price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('frontend.cart.index')->with('success', 'เพิ่มสินค้าลงตะกร้าเรียบร้อยแล้ว!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            if ($request->action == 'increase') {
                $product = Product::with('stocks')->find($id);
                $availableStock = $product && $product->stocks ? $product->stocks->where('status', '!=', 'ขายแล้ว')->count() : 0;

                if ($cart[$id]['quantity'] < $availableStock) {
                    $cart[$id]['quantity']++;
                } else {
                    return redirect()->back()->with('error', 'ไม่สามารถเพิ่มได้เกินสต็อกที่มีอยู่');
                }
            } elseif ($request->action == 'decrease') {
                $cart[$id]['quantity']--;
                if ($cart[$id]['quantity'] <= 0) {
                    unset($cart[$id]);
                }
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'กรุณาล็อกอินก่อนทำการสั่งซื้อครับ');
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'ไม่มีสินค้าในตะกร้า');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += ($item['price'] * $item['quantity']);
        }

        $user = User::find(Auth::id());
        if ($user->points < $total) {
            return redirect()->back()->with('error', 'Points ของคุณไม่พอ');
        }

        DB::transaction(function () use ($cart, $user, $total) {
            $user->decrement('points', $total);

            $order = Order::create([
                'user_id' => $user->id,
                'order_id' => 'ORD-' . strtoupper(uniqid()),
                'total' => $total,
                'status' => 'ชำระเงินสำเร็จ'
            ]);

            foreach ($cart as $id => $item) {
                $qtyToBuy = $item['quantity'];
                $stocks = Stock::where('product_id', $id)
                    ->where(function ($q) {
                        $q->where('status', '!=', 'ขายแล้ว')->orWhereNull('status');
                    })
                    ->limit($qtyToBuy)
                    ->get();

                $descriptions = [];
                foreach ($stocks as $stock) {
                    $stock->update(['status' => 'ขายแล้ว']);
                    $descriptions[] = $stock->description;
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'item_name' => $item['name'],
                    'quantity' => $qtyToBuy,
                    'price' => $item['price'],
                    'description' => implode("\n", $descriptions)
                ]);
            }
        });

        session()->forget('cart');
        return redirect()->route('frontend.history')->with('success', 'สั่งซื้อสำเร็จ!');
    }

    public function history()
    {
        $history = Order::with('items')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        
        // แปลงข้อมูลให้เป็น Format เดิมเพื่อให้หน้า View ใช้งานได้เหมือนเดิม
        $formattedHistory = $history->map(function ($order) {
            return [
                'order_id' => $order->order_id,
                'date' => $order->created_at->format('d/m/Y H:i'),
                'status' => $order->status,
                'total' => $order->total,
                'items' => $order->items->map(function ($item) {
                    return [
                        'name' => $item->item_name,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'descriptions' => explode("\n", $item->description)
                    ];
                })
            ];
        });

        return view('frontend.history', ['history' => $formattedHistory]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'ลบสินค้าเรียบร้อย');
    }
}