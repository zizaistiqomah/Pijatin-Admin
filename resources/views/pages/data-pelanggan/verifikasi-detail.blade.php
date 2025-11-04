@extends('layouts.app')
@section('navtitle', 'Detail Verifikasi')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen pt-[90px]">
    <div class="flex items-center mb-4">
        <a href="{{ route('pages.data-pelanggan.verifikasi') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="font-semibold">Detail Verifikasi</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Profil -->
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center">
            <img src="{{ $pelanggan->profile_photo_url ?? 'https://i.pravatar.cc/150' }}" 
                 alt="Foto Profil" class="w-32 h-32 rounded-full object-cover mb-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $pelanggan->nama }}</h3>
            <span class="bg-[#D6F6EE] text-[#3AB081] text-sm px-3 py-1 rounded-full mb-4">Customer</span>

            <div class="w-full text-left">
                <h4 class="text-gray-800 font-semibold mb-2">Informasi Akun</h4>
                <div class="flex justify-between border-t border-gray-200 py-2 text-sm">
                    <span class="text-gray-500">Alamat Email</span>
                    <span class="text-gray-800 font-medium">{{ $pelanggan->email }}</span>
                </div>
                <div class="flex justify-between border-t border-gray-200 py-2 text-sm">
                    <span class="text-gray-500">Ponsel</span>
                    <span class="text-gray-800 font-medium">{{ $pelanggan->ponsel ?? '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Identitas & Informasi Lain -->
        <div class="flex flex-col space-y-6">
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-gray-800 font-semibold">Identitas Diri</h4>
                    @if($pelanggan->foto_ktp)
                        <a href="{{ asset('storage/' . $pelanggan->foto_ktp) }}" target="_blank" class="text-[#3AB081] text-sm font-medium hover:underline">
                            Lihat Foto KTP
                        </a>
                    @endif
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between border-t border-gray-200 py-2">
                        <span class="text-gray-500">NIK</span>
                        <span class="text-gray-800 font-medium">{{ $pelanggan->nik ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-t border-gray-200 py-2">
                        <span class="text-gray-500">Nama Lengkap</span>
                        <span class="text-gray-800 font-medium">{{ $pelanggan->nama }}</span>
                    </div>
                    <div class="flex justify-between border-t border-gray-200 py-2">
                        <span class="text-gray-500">Jenis Kelamin</span>
                        <span class="text-gray-800 font-medium">{{ $pelanggan->jenis_kelamin ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <h4 class="text-gray-800 font-semibold mb-4">Informasi Lainnya</h4>
                <div class="flex justify-between items-center border-t border-gray-200 py-2 text-sm">
                    <span class="text-gray-500">Tanggal Bergabung</span>
                    <span class="text-gray-800 font-medium">
                        {{ $pelanggan->tanggal_bergabung ? \Carbon\Carbon::parse($pelanggan->tanggal_bergabung)->translatedFormat('d F Y') : '-' }}
                    </span>
                </div>
                <div class="flex justify-end space-x-3 mt-4">
                    <form action="{{ route('pages.data-pelanggan.verifikasi.reject', $pelanggan->id) }}" method="POST" onsubmit="return confirm('Tolak akun ini?')">
                        @csrf
                        <button class="border border-red-400 text-red-500 px-4 py-1.5 rounded-md hover:bg-red-50 transition">Tolak</button>
                    </form>
                    <form action="{{ route('pages.data-pelanggan.verifikasi.approve', $pelanggan->id) }}" method="POST" onsubmit="return confirm('Verifikasi akun ini?')">
                        @csrf
                        <button class="border border-[#3AB081] text-[#3AB081] px-4 py-1.5 rounded-md hover:bg-[#E9FBF3] transition">Verifikasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
