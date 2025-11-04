@extends('layouts.app')
@section('navtitle', 'Detail Akun Pelanggan')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen pt-[110px] px-8 pb-10">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-4 flex items-center space-x-2">
        <a href="{{ route('pages.data-pelanggan.akun') }}"
           class=" font-semi-bold text-xl"> < Data Akun Pelanggan
        </a>
    </div>

    <h1 class="text-2xl font-bold text-gray-800 mb-8">Detail Akun Pelanggan</h1>

    <div class="grid grid-cols-3 gap-6">
        <!-- Kolom kiri -->
        <div class="col-span-2">
            <div class="bg-white rounded-2xl shadow p-8">
                <div class="flex flex-col items-center">
                    <!-- Foto Profil -->
                    <img src="{{ $pelanggan->foto_profile 
                        ? asset('storage/'.$pelanggan->foto_profile)
                        : asset('images/default-profile.png') }}"
                        alt="Foto {{ $pelanggan->nama }}"
                        class="w-32 h-32 rounded-full object-cover mb-4 shadow">

                    <h2 class="text-xl font-bold text-gray-800">{{ $pelanggan->nama }}</h2>
                    <span class="mt-1 text-sm bg-[#CFF5E7] text-[#048654] px-3 py-1 rounded-full font-medium">
                        Customer
                    </span>
                </div>

                <div class="flex flex-col space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Akun</h3>
                    <div class="space-y-4 text-gray-700">
                        <div class="flex justify-between border-b pb-2">
                            <span>Status Akun</span>
                            <span class="text-green-700 font-semibold">Tidak dalam Penangguhan</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span>Alamat Email</span>
                            <span>{{ $pelanggan->email ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span>Ponsel</span>
                            <span>{{ $pelanggan->ponsel ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom kanan -->
        <div class="space-y-6 text-sm">
            <!-- Identitas Diri -->
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-lg font-semibold text-gray-800">Identitas Diri</h3>
                    <a href="{{ $pelanggan->foto_ktp ? asset('storage/'.$pelanggan->foto_ktp) : '#' }}"
                       target="_blank"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Lihat Foto KTP
                    </a>
                </div>

                <div class="space-y-3 text-bold text-gray-700 text-sm">
                    <div class="flex justify-between border-b pb-1">
                        <span>NIK</span>
                        <span>{{ $pelanggan->nik ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-1">
                        <span>Nama Lengkap</span>
                        <span>{{ $pelanggan->nama ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-1">
                        <span>Jenis Kelamin</span>
                        <span>{{ $pelanggan->jenis_kelamin ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Lainnya -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Informasi Lainnya</h3>
                <div class="space-y-3 text-gray-700 text-sm">
                    <div class="flex justify-between border-b pb-1">
                        <span>Tanggal Bergabung</span>
                        <span>{{ \Carbon\Carbon::parse($pelanggan->created_at)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-1">
                        <span>Total Pesan Layanan</span>
                        <span>{{ $pelanggan->total_layanan ?? 0 }} Layanan</span>
                    </div>
                    <div class="flex justify-between border-b pb-1">
                        <span>Total Layanan Dibatalkan</span>
                        <span>{{ $pelanggan->total_batal ?? 0 }} Pembatalan</span>
                    </div>
                    <div class="flex justify-between border-b pb-1">
                        <span>Total Peringatan Diterima</span>
                        <span>{{ $pelanggan->total_peringatan ?? 0 }}x Peringatan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Riwayat -->
    <div class="flex justify-end mt-8">
        <a href="{{ route('pages.data-pelanggan.riwayat-pesanan', $pelanggan->id) }}"
           class="bg-teal-700 hover:bg-teal-500 text-white font-semibold px-6 py-3 rounded-lg shadow">
           Riwayat Pesanan
        </a>
    </div>
</div>
@endsection
