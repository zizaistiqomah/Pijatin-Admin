@extends('layouts.app')
@section('navtitle', 'Detail Semua - ' . optional($order->pelanggan)->nama)

@section('content')
<div class="bg-[#E9FFF2] min-h-screen">
    <!-- Breadcrumb -->
    <div class="px-8 pt-6 text-sm text-gray-500">
        <a href="{{ url('order.semua.detail') }}" class="hover:text-green-600">Order</a> /
        <span>Semua</span> /
        <span class="text-gray-700">Detail</span>
    </div>

    <!-- Judul -->
    <div class="flex items-center justify-between px-8 mt-3">
        <h2 class="text-xl font-semibold text-gray-800">
            Detail Semua - {{ optional($order->pelanggan)->nama ?? $order->nama_pemesan ?? '-' }}
        </h2>
    </div>

    <!-- Card Detail -->
    <div class="px-8 py-6">
        <div class="bg-white shadow-md rounded-2xl p-6 w-full max-w-xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                Layanan {{ $order->layanan }}
            </h3>
            <p class="text-sm text-gray-500 mb-4">
                Pesanan - {{ optional($order->pelanggan)->nama ?? $order->nama_pemesan ?? '-' }}
            </p>

            <!-- Informasi Layanan -->
            <div class="space-y-2 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-800">Harga Layanan {{ $order->layanan }}:</span>
                    <span class="text-green-700 font-semibold">Rp{{ number_format($order->harga_layanan, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Jadwal Layanan:</span>
                    <span class="font-semibold">{{ \Carbon\Carbon::parse($order->tanggal_layanan)->format('d-m-Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Tanggal Pemesanan:</span>
                    <span class="font-semibold">{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d-m-Y') }}</span>
                </div>
                <div class="flex justify-between items-start">
                    <span>Alamat Pemesanan:</span>
                    <span class="text-right w-1/2">{{ $order->alamat }}</span>
                </div>
            </div>

            <hr class="my-4">

            <!-- Informasi Pelanggan & Terapis -->
            <div class="space-y-2 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Nama Pelanggan:</span>
                    <span class="font-semibold">{{ optional($order->pelanggan)->nama ?? $order->nama_pemesan ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Ponsel Pelanggan:</span>
                    <span class="font-semibold">{{ optional($order->pelanggan)->ponsel ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Nama Terapis:</span>
                    <span class="font-semibold">{{ optional($order->terapis)->nama ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Ponsel Terapis:</span>
                    <span class="font-semibold">{{ optional($order->terapis)->ponsel ?? '-' }}</span>
                </div>
            </div>


            <hr class="my-4">

        

            <!-- Informasi Tambahan -->
            <div class="space-y-2 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Layanan Tambahan:</span>
                    <span class="font-semibold">{{ $order->layanan_tambahan ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Durasi:</span>
                    <span class="font-semibold">{{ $order->durasi ?? '-' }} Menit</span>
                </div>
                <div class="flex justify-between">
                    <span>Total Biaya Layanan:</span>
                    <span class="text-green-700 font-semibold">
                        Rp{{ number_format($order->layanan_tambahan_harga, 0, ',', '.') }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span>Metode:</span>
                    <span class="font-semibold">{{ ucfirst($order->metode) ?? '-' }}</span>
                </div>

                <!-- Total Harga & Status -->
            <div class="flex justify-between items-center">
                <h4 class="text-md font-semibold text-gray-800">
                    Total Harga
                </h4>
                <div class="flex items-center gap-2">
                    <span class="text-black text-lg font-semibold">
                        Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            
                <hr class="my-4">
            
                <div class="mt-4 text-right">
                    <span class="text-orange-500 font-semibold text-xl">
                        {{ ucfirst($order->status ?? 'Pending') }}
                    </span>
                </div>
            </div>

        </div>

            

        

            

        <!-- Tombol Cek Struk -->
        <div class="text-center mt-6">
            <button class="bg-teal-600 hover:bg-[#25694B] text-white font-medium py-2 px-8 rounded-lg shadow">
                Cek Struk
            </button>
        </div>
    </div>
</div>
@endsection
