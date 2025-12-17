@extends('layouts.app')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen pt-[110px] px-8 pb-10">

    {{-- HEADER --}}

    <div class="text-sm text-gray-600 mb-4 ml-2">
        <a href="{{ route('report.index') }}" class="hover:underline">
            Data Laporan Pelanggan
        </a> >
        <span class="font-semibold">Detail Laporan</span>
    </div>

    {{-- CARD HEADER --}}
    <div class="bg-white rounded-2xl shadow p-6 flex justify-between items-center mb-6">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/default-profile.png') }}"
                 class="w-14 h-14 rounded-full object-cover">
            <div>
                <p class="font-semibold">{{ $report->pelanggan->nama }}</p>
                <p class="text-sm text-gray-400">Pelanggan</p>
            </div>
        </div>
        <p class="text-sm text-gray-400">
            {{ \Carbon\Carbon::parse($report->created_at)->format('H:i, d F Y') }}
        </p>
    </div>

    {{-- CONTENT GRID --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ISI LAPORAN (KIRI) --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Isi Laporan</h3>

            <div class="mb-4">
                <p class="text-sm text-gray-400">Bukti Pendukung</p>
                @if ($report->evidence_link)
                    <a href="{{ $report->evidence_link }}" target="_blank"
                       class="text-blue-500 underline">
                        {{ $report->evidence_link }}
                    </a>
                @else
                    <p class="italic text-gray-400">Tidak ada bukti pendukung</p>
                @endif
            </div>

            <div>
                <p class="text-sm text-gray-400 mb-2">Alasan & Detail Aduan</p>
                <p class="text-gray-800 leading-relaxed">
                    {{ $report->description }}
                </p>
            </div>
        </div>

        {{-- DATA TERLAPOR (KANAN) --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Data Terlapor</h3>

            <div class="space-y-4 text-sm">
                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-400">Nama Lengkap</span>
                    <span>{{ $report->therapist->nama ?? '-' }}</span>
                </div>

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-400">Area Kerja</span>
                    <span>{{ $report->therapist->area_kerja ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-400">Jenis Kelamin</span>
                    <span>{{ $report->therapist->jenis_kelamin ?? '-' }}</span>
                </div>
            </div>

            {{-- ACTION BUTTON --}}
            <div class="mt-6 flex gap-3">
                <form action="{{ route('report.warning', $report->id) }}" method="POST" class="w-1/2">
                    @csrf
                    <button class="w-full border border-orange-400 text-orange-500 py-2 rounded-lg">
                        Kirim Peringatan
                    </button>
                </form>

                <form action="{{ route('report.suspend', $report->id) }}" method="POST" class="w-1/2">
                    @csrf
                    <button class="w-full border border-red-400 text-red-500 py-2 rounded-lg">
                        Tangguhkan Akun
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
