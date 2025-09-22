<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Models\Order;

// Routing Sidebar Super Admin
Route::get('/', function () {
    return view('pages.SuperAdminDashboard');
})->name('dashboard');

Route::get('/layanan', function () {
    return view('pages.SuperAdminLayanan');
})->name('layanan');

Route::get('/pesanan', function () {
    return view('pages.SuperAdminPesanan');
})->name('pesanan');

Route::get('/cabang', function () {
    return view('pages.SuperAdminCabang');
})->name('cabang');

Route::get('/karyawan', function () {
    return view('pages.SuperAdminKaryawan');
})->name('karyawan');

Route::get('/pelanggan', function () {
    return view('pages.SuperAdminPelanggan');
})->name('pelanggan');

Route::get('/terapis', function () {
    return view('pages.SuperAdminTerapis');
})->name('terapis');

Route::get('/penangguhan', function () {
    return view('pages.SuperAdminPenangguhan');
})->name('penangguhan');

Route::get('/aduan-pelanggan', function () {
    return view('pages.SuperAdminAduanPelanggan');
})->name('aduan-pelanggan');

Route::get('/faq', function () {
    return view('pages.SuperAdminFAQ');
})->name('faq');

Route::get('/superadmin/karyawan/detail-akun', function () {
    return view('pages.SuperAdminKaryawanDetailAkun');
});

Route::get('/superadmin/karyawan/detail-akunFinance', function () {
    return view('pages.SuperAdminKaryawanDetailAkunFinance');
});

Route::get('/superadmin/karyawan/create', function () {
    return view('pages.SuperAdminKaryawanBuatAkun');
});

Route::get('/superadmin/pelanggan/detail-akun', function () {
    return view('pages.SuperAdminPelangganDetailAkun');
});










Route::get('/order/semua', function (Request $request) {
    $search = $request->get('search');

    // Semua data order
    $orders = Order::query()
        ->when($search, function ($query, $search) {
            $query->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

    // Dikonfirmasi = pending, menunggu, berlangsung, dijadwalkan
    $confirmedOrders = Order::whereIn('status', ['pending', 'menunggu', 'berlangsung', 'dijadwalkan','selesai'])->get();

    // Dibatalkan = selesai
    $canceledOrders = Order::whereIn('status', ['dibatalkan'])->get();

    return view('pages.order.semua', compact('orders', 'confirmedOrders', 'canceledOrders', 'search'));
})->name('pages.order.semua');

Route::get('/order/{id}/detail', [OrderController::class, 'show'])->name('order.detail');

Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.delete');




