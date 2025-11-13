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

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('pages.order.semua')->with('success', 'Order berhasil dihapus.');
    }


    public function berlangsung()
    {
        // Ambil data order dengan status 'Berlangsung'
        $orders = Order::where('status', 'Berlangsung')->get();

        return view('pages.order.berlangsung', compact('orders'));
    }

    public function selesai()
    {
        $orders = Order::where('status', 'Selesai')->get();

        return view('pages.order.selesai', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::with(['pelanggan', 'terapis'])->findOrFail($id);

        // Hitung total biaya dari harga layanan + layanan tambahan (jika ada)
        $hargaLayanan = $order->harga_layanan ?? 0;
        $hargaTambahan = $order->layanan_tambahan_harga ?? 0;

        // total biaya gabungan
        $order->total_harga = $hargaLayanan + $hargaTambahan;

        // Kirim ke view berdasarkan status
        switch (strtolower($order->status)) {
            case 'pending':
                return view('pages.order.detail-pending', compact('order'));
            case 'dikonfirmasi':
                return view('pages.order.detail-dikonfirmasi', compact('order'));
            case 'berlangsung':
                return view('pages.order.detail-berlangsung', compact('order'));
            case 'selesai':
                return view('pages.order.detail-selesai', compact('order'));
            default:
                abort(404);
        }
    }



    
}
