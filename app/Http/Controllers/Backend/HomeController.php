<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Stock;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRevenue = Order::sum('total');
        $totalStock = Stock::count();
        $onlineUsers = User::where('level', 'admin')->count();

        $days = [];
        $revenueData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $days[] = $date->locale('th')->dayName;

            $dailySum = Order::whereDate('created_at', $date->format('Y-m-d'))->sum('total');
            $revenueData[] = (float)$dailySum;
        }

        $categoryStats = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select('orders.status as cat_name', DB::raw('count(order_items.id) as count'))
            ->groupBy('orders.status')
            ->get();

        $salesLabels = $categoryStats->pluck('cat_name')->toArray();
        $salesSeries = $categoryStats->pluck('count')->toArray();

        return view('backend.home', compact(
            'totalUsers',
            'totalRevenue',
            'totalStock',
            'onlineUsers',
            'days',
            'revenueData',
            'salesLabels',
            'salesSeries'
        ));
    }
}
