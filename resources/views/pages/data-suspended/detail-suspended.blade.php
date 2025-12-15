@extends('layouts.app')
@section('navtitle', 'Detail Akun Ditangguhkan')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen pt-[110px] px-8 pb-10">

    {{-- Breadcrumb --}}
    <div class="text-sm text-gray-600 mb-4 ml-2">
        <a href="{{ route('suspended') }}" class="hover:underline">
            Data Suspend
        </a> >
        <span class="font-semibold">Detail Akun</span>
    </div>

    {{-- Judul --}}
    <div class="flex items-center space-x-2 mb-8">
        <a href="{{ route('suspended') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                <path fill="#444" d="M15 6l-6 6 6 6" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-700">Detail Akun Ditangguhkan</h1>
    </div>

    {{-- Grid Layout --}}
    <div class="grid grid-cols-3 gap-8">

        {{-- Kiri (Foto + Informasi Akun) --}}
        <div class="col-span-2 bg-white shadow rounded-2xl p-10">

            {{-- Foto --}}
            <div class="flex flex-col items-center">
                <img src="{{ $item->foto_profile 
                    ? asset('uploads/' . $item->foto_profile)
                    : asset('images/default-profile.png') }}"
                    class="w-40 h-40 rounded-full object-cover shadow mb-4">

                <h2 class="text-xl font-bold text-gray-800">{{ $item->nama }}</h2>

                <span class="mt-2 px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">
                    {{ $item->tipe_pengguna ?? 'Pelanggan' }}
                </span>
            </div>

            {{-- Informasi Akun --}}
            <h3 class="text-lg font-semibold mt-10 mb-4 text-gray-800">Informasi Akun</h3>

            <div class="space-y-4">

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-500">Status Akun</span>
                    @php
                    if (in_array(strtolower($item->status), ['7 hari', '14 hari', '30 hari'])) {
                        $statusAkun = 'Penangguhan Sementara';
                        $badgeClass = 'bg-orange-300 text-orange-800';
                    } else {
                        $statusAkun = 'Penangguhan Permanen';
                        $badgeClass = 'bg-red-300 text-red-800';
                    }
                @endphp

                <span class="mt-2 px-4 py-1 rounded-full text-sm font-medium {{ $badgeClass }}">
                    {{ $statusAkun }}
                </span>

                </div>

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-500">Alamat Email</span>
                    <span class="text-gray-700">{{ $item->email ?? '-' }}</span>
                </div>

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-500">Ponsel</span>
                    <span class="text-gray-700">{{ $item->no_hp ?? '-' }}</span>
                </div>

            </div>
        </div>

        {{-- Kanan (Identitas Diri + Penangguhan) --}}
        <div class="space-y-8">

            {{-- Identitas Diri --}}
            <div class="bg-white shadow rounded-2xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Identitas Diri</h3>

                    @if($item->foto_ktp)
                    <a href="{{ asset('uploads/' . $item->foto_ktp) }}"
                       target="_blank"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Lihat Foto KTP
                    </a>
                    @endif
                </div>

                <div class="space-y-3 text-sm text-gray-700">

                    <div class="flex justify-between border-b pb-2">
                        <span>NIK</span>
                        <span>{{ $item->nik ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span>Nama Lengkap</span>
                        <span>{{ $item->nama }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span>Jenis Kelamin</span>
        ​                <span>{{ $item->jenis_kelamin }}</span>
                    </div>

                </div>
            </div>

            {{-- Informasi Penangguhan --}}
            <div class="bg-white shadow rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Penangguhan</h3>

                <div class="space-y-3 text-sm text-gray-700">

                    <div class="flex justify-between border-b pb-2">
                        <span>Tanggal Ditangguhkan</span>
                        <span>
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span>Tanggal Selesai Penangguhan</span>
                        <span>
                            {{ $item->tanggal_selesai 
                                ? \Carbon\Carbon::parse($item->selesai)->translatedFormat('d F Y')
                                : '-' }}
                        </span>
                    </div>

                </div>

                @if($item->file_laporan)
                <div class="flex justify-end mt-4">
                    <a href="{{ asset('uploads/' . $item->file_laporan) }}"
                       target="_blank"
                       class="border border-orange-400 text-orange-500 px-4 py-2 rounded-lg hover:bg-orange-50 text-sm font-medium">
                        Lihat Laporan
                    </a>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
