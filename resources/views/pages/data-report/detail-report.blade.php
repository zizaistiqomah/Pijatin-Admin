@extends('layouts.app')
@section('navtitle', 'Detail Laporan')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen px-6 py-6">

    {{-- Back --}}
    <div class="flex items-center gap-2 text-gray-500 mb-4">
        <a href="{{ route('report') }}" class="flex items-center gap-2 text-gray-700 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="font-semibold text-base">Detail Laporan</span>
        </a>
    </div>

    {{-- Header --}}
    <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <div class="h-14 w-14 rounded-full bg-[#469D89] text-white flex items-center justify-center text-lg font-semibold">
                {{ strtoupper(substr(optional($report->customer)->nama ?? 'U', 0, 2)) }}
            </div>
            <div>
                <p class="font-semibold text-gray-800 text-lg">
                    {{ optional($report->customer)->nama ?? '-' }}
                </p>
                <p class="text-sm text-gray-500">Pelanggan</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($report->report_date)->translatedFormat('H:i, d F Y') }}
            </p>
            <a href="#"
               class="mt-2 inline-block px-4 py-1.5 border border-blue-500 text-blue-500 rounded-lg text-sm hover:bg-blue-50">
                Detail Pesanan
            </a>
        </div>
    </div>

    {{-- ===== GRID FIX (PAKSA DESKTOP HORIZONTAL) ===== --}}
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- ISI LAPORAN — KIRI --}}
            <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-gray-700 mb-6 text-lg">Isi Laporan</h3>

                <div class="space-y-5 text-sm">
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Pelapor</span>
                        <span class="font-medium text-gray-800">
                            {{ optional($report->customer)->nama ?? '-' }}
                        </span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Bukti Pendukung (Opsional)</span>
                        @if(!empty($report->proof_url))
                            <a href="{{ $report->proof_url }}" target="_blank"
                               class="text-blue-500 underline">
                                Lihat Dokumen
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </div>

                    <div>
                        <p class="text-gray-500 mb-2">Alasan dan Detail Aduan</p>
                        <div class="bg-gray-50 border rounded-lg p-4 text-gray-700 leading-relaxed">
                            {{ $report->description }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- DATA TERLAPOR — KANAN --}}
            <div class="md:col-span-1 bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-gray-700 mb-6 text-lg">Data Terlapor</h3>

                <div class="space-y-5 text-sm">
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Nama Lengkap</span>
                        <span class="font-medium text-gray-800">
                            {{ $report->reported_name ?? '-' }}
                        </span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Area Kerja</span>
                        <span class="font-medium text-gray-800">
                            {{ $report->work_area ?? '-' }}
                        </span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Jenis Kelamin</span>
                        <span class="font-medium text-gray-800">
                            {{ $report->gender ?? '-' }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col gap-3 mt-8">
                    <button
                        class="w-full px-4 py-2 border border-orange-400 text-orange-500 rounded-lg hover:bg-orange-50 text-sm">
                        Kirim Peringatan
                    </button>
                    <button
                        class="w-full px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-50 text-sm">
                        Tangguhkan Akun
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
