<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    // Kalau kamu memang pakai nama route -> controller method 'pelanggan'
    public function pelanggan(Request $request)
    {
        // optional: support pencarian
        $search = $request->input('search');

        // ambil data (pakai paginate biar sesuai desain)
        $terapis = Pelanggan::when($search, function($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('ponsel', 'like', "%{$search}%");
        })->orderBy('id', 'asc')->paginate(10);

        // kirim ke view
        return view('pages.data-pelanggan.akun', compact('pelanggan', 'search'));
    }

    public function akun()
    {
        $pelanggan = Pelanggan::where('status', 'terverifikasi')->get();
        return view('pages.data-pelanggan.akun', compact('pelanggan'));
    }

    public function detail($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // ambil semua data pelanggan dari database 

        return view('pages.data-pelanggan.akun-detail', compact('pelanggan'));
    }

    public function show($id)
    {
        return redirect()->route('pages.data-pelanggan.akun.detail', $id);
    }


    public function verifikasi(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pelanggan = $query->orderByRaw("
            CASE 
                WHEN status = 'menunggu' THEN 1
                WHEN status = 'terverifikasi' THEN 2
                WHEN status = 'ditolak' THEN 3
                ELSE 4
            END
        ")->get();

        return view('pages.data-pelanggan.verifikasi', compact('pelanggan'));
    }



    // Tampilkan detail akun yang dipilih
    public function showVerifikasiDetail($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pages.data-pelanggan.verifikasi-detail', compact('pelanggan'));
    }

    // Update status akun (verifikasi / tolak)
    public function updateStatus($id, $status)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->status = $status;
        $pelanggan->save();

        return redirect()->route('pages.data-pelanggan.verifikasi')
            ->with('success', 'Status akun berhasil diperbarui!');
    }

    public function approveVerifikasi($id)
    {
        // Ambil data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Update status menjadi 'terverifikasi'
        $pelanggan->status = 'terverifikasi';
        $pelanggan->save();

        // Redirect balik ke halaman daftar verifikasi dengan pesan sukses
        return redirect()
            ->route('pages.data-pelanggan.verifikasi')
            ->with('success', 'Akun pelanggan berhasil diverifikasi.');
    }

    public function rejectVerifikasi($id)
    {
        // Ambil data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Ubah status menjadi 'ditolak'
        $pelanggan->status = 'ditolak';
        $pelanggan->save();

        // Kembalikan ke halaman daftar verifikasi dengan pesan
        return redirect()
            ->route('pages.data-pelanggan.verifikasi')
            ->with('error', 'Akun pelanggan telah ditolak.');
    }

    public function detailAkun($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        // Dummy data tambahan (sementara, nanti bisa diambil dari tabel pemesanan)
        $pelanggan->total_layanan = 40;
        $pelanggan->total_batal = 2;
        $pelanggan->total_peringatan = 3;

        return view('pages.data-pelanggan.akun-detail', compact('pelanggan'));
    }

    public function riwayatPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pages.data-pelanggan.riwayat', compact('pelanggan'));
    }




    public function riwayatPesanan($id)
    {
        // Ambil pelanggan dari database
        $pelanggan = Pelanggan::findOrFail($id);

        // Dummy data riwayat pesanan (nanti bisa diganti pakai model Pesanan)
        $riwayat = [
            [
                'id' => 1,
                'tanggal' => '2025-10-28',
                'waktu' => '10:30',
                'metode' => 'Transfer',
                'total' => '150.000',
                'status' => 'Selesai',
                'terapis' => [
                    'nama' => 'Dewi Anggraini',
                    'gender' => 'Perempuan',
                ],
            ],
            [
                'id' => 2,
                'tanggal' => '2025-10-26',
                'waktu' => '14:00',
                'metode' => 'Cash',
                'total' => '120.000',
                'status' => 'Dibatalkan',
                'terapis' => [
                    'nama' => 'Rudi Hartono',
                    'gender' => 'Laki-laki',
                ],
            ],
            [
                'id' => 3,
                'tanggal' => '2025-10-26',
                'waktu' => '15:05',
                'metode' => 'Transfer',
                'total' => '120.000',
                'status' => 'Dibatalkan',
                'terapis' => [
                    'nama' => 'Aleraka',
                    'gender' => 'Laki-laki',
                ],
            ],
        ];

        // Kirim ke view
        return view('pages.data-pelanggan.riwayat-pesanan', compact('pelanggan', 'riwayat'));
    }



    








    // (opsional) tambahkan method CRUD lain jika perlu


}
