<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $orders = Order::when($search, function($query, $search) {
                return $query->where('nama_pemesan', 'like', "%{$search}%")
                             ->orWhere('jenis_layanan', 'like', "%{$search}%")
                             ->orWhere('status', 'like', "%{$search}%");
            })
            ->orderBy('jadwal_layanan', 'asc')
            ->get();

        return view('pages.order.semua', compact('orders', 'search'));
    }

    public function semua()
    {
        $orders = Order::all(); // semua data order
        $confirmedOrders = Order::where('status', 'dikonfirmasi')->get();
        $canceledOrders = Order::where('status', 'dibatalkan')->get();

        return view('pages.order.semua', compact('orders', 'confirmedOrders', 'canceledOrders'));
    }

    
}
