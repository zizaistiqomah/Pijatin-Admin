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

    public function semua(Request $request)
    {
        $search = $request->input('search');

        // mapping status dikonfirmasi
        $confirmedStatuses = ['Pending', 'Menunggu', 'Berlangsung', 'Dijadwalkan', 'Selesai'];

        $orders = Order::when($search, function($query, $search) {
                return $query->where('nama_pemesan', 'like', "%{$search}%")
                            ->orWhere('jenis_layanan', 'like', "%{$search}%")
                            ->orWhere('status', 'like', "%{$search}%");
            })
            ->orderBy('jadwal_layanan', 'asc')
            ->get();

        $confirmedOrders = Order::whereIn('status', $confirmedStatuses)->get();
        $canceledOrders = Order::whereRaw('LOWER(status) = ?', ['dibatalkan'])->get();


        return view('pages.order.semua', compact('orders', 'search', 'confirmedOrders', 'canceledOrders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id); // cari order berdasarkan ID
        return view('pages.order.detail', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('pages.order.semua')->with('success', 'Order berhasil dihapus.');
    }

    
}
