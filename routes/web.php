<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelangganController as ControllersPelangganController;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Terapis;
use App\Http\Controllers\TerapisController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PelangganController;

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









//Orders
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
Route::get('/order/berlangsung', [OrderController::class, 'berlangsung'])->name('pages.order.berlangsung');
Route::get('/order/selesai', [OrderController::class, 'selesai'])->name('pages.order.selesai');
Route::resource('order', OrderController::class);
//detail
Route::prefix('order')->group(function () {
    Route::get('/semua/detail/{id}', [OrderController::class, 'show'])->name('order.semua.detail');
});



//Terapis
Route::get('/terapis', [TerapisController::class, 'terapis'])
    ->name('data-terapis.terapis');
Route::get('/terapis/{id}', [TerapisController::class, 'show'])->name('terapis.detail');
Route::delete('/terapis/{id}', [TerapisController::class, 'destroy'])->name('terapis.delete');

//Rating & Ulasan 
Route::get('/rating', [RatingController::class, 'rating'])
    ->name('data-terapis.rating');
Route::get('/rating/{id}', [RatingController::class, 'show'])->name('rating.detail');
Route::delete('/rating/{id}', [TerapisController::class, 'destroy'])->name('rating.delete');

//Pelanggan
Route::get('/akun', [PelangganController::class, 'akun'])
    ->name('pages.data-pelanggan.akun');
Route::get('/akun/{id}', [PelangganController::class, 'show'])->name('pages.data-pelanggan.detail'); 
Route::delete('/akun/{id}', [PelangganController::class, 'destroy'])->name('akun.delete'); 
Route::get('/data-pelanggan.verifikasi', [PelangganController::class, 'verifikasi'])->name('pages.data-pelanggan.verifikasi');
Route::get('/data-pelanggan.verifikasi/{id}', [PelangganController::class, 'verifikasiDetail'])->name('pages.data-pelanggan.verifikasi.detail');
Route::get('/data-pelanggan/verifikasi/{id}', [PelangganController::class, 'showVerifikasiDetail'])
    ->name('pages.data-pelanggan.verifikasi.detail');
Route::post('/verifikasi/update/{id}/{status}', [PelangganController::class, 'updateStatus'])
    ->name('verifikasi.update');
// Aksi approve verifikasi
Route::post('/data-pelanggan.verifikasi/{id}/approve', [PelangganController::class, 'approveVerifikasi'])
    ->name('pages.data-pelanggan.verifikasi.approve');
// Aksi reject verifikasi
Route::post('/data-pelanggan.verifikasi/{id}/reject', [PelangganController::class, 'rejectVerifikasi'])
    ->name('pages.data-pelanggan.verifikasi.reject');
//detail akun pelanggan
Route::get('/data-pelanggan/akun/{id}', [PelangganController::class, 'detailAkun'])
    ->name('pages.data-pelanggan.akun.detail');
//riwayat pemesanan
Route::get('/data-pelanggan/riwayat-pesanan/{id}', [PelangganController::class, 'riwayatPesanan'])
    ->name('pages.data-pelanggan.riwayat-pesanan');



