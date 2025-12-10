@extends('layouts.app')
@section('navtitle', 'Detail Rating')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen pt-[110px] px-8 pb-10">
    
    {{-- Tombol Back --}}
    <a href="{{ route('data-terapis.rating') }}" class="flex items-center text-[#469D89] mb-6">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" class="mr-2">
            <path d="M15 5l-7 7 7 7"/>
        </svg>
        Kembali
    </a>

    <div class="ml-[90px] mr-[90px] -mt-8 flex gap-6">

        {{-- Kartu Kiri (Foto + Nama + Rating + Ulasan) --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">

            {{-- Foto Terapis --}}
            <img src="{{ $rating->terapis->foto ?? asset('images/user-default.png') }}"
                 class="w-40 h-40 rounded-full mx-auto mb-4 object-cover">

            {{-- Nama --}}
            <h2 class="text-xl font-bold text-gray-700">{{ $rating->terapis->nama }}</h2>

            {{-- Label Terapis --}}
            <span class="text-xs px-3 py-1 mt-1 rounded-full bg-[#E1FFF4] text-[#469D89] inline-block">
                Terapis
            </span>

            {{-- Rating Bintang --}}
            <div class="flex justify-center mt-3 mb-3">
                @php
                    $score = $rating->score ?? 0; // pastikan ada nilai
                @endphp

                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $score)
                        {{-- Bintang kuning (aktif) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.785.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @else
                        {{-- Bintang abu (kosong) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.785.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endif
                @endfor
            </div>


            {{-- Ulasan --}}
            <p class="text-gray-600 italic px-6">
                "{{ $rating->ulasan }}"
            </p>

        </div>

        {{-- Kartu Informasi --}}
        <div class="space-y-6">

            {{-- Informasi Layanan --}}
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-bold text-gray-700 mb-4">Informasi Layanan</h3>

                <div class="flex justify-between">
                        <span class="text-gray-600">Nama Customer :</span>
                        <span class="font-medium text-gray-800">{{ $namaPelanggan ?? '-' }}</span>
                    </div>

                <div class="flex justify-between">
                        <span class="text-gray-600">Jenis Layanan :</span>
                        <span class="font-medium text-gray-800">{{ $rating->jenis_layanan ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Layanan Tambahan :</span>
                        <span class="font-medium text-gray-800">{{ $rating->layanan_tambahan ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Durasi :</span>
                        <span class="font-medium text-gray-800">{{ $rating->durasi_layanan ?? '-' }}</span>
                    </div>

            </div>

            {{-- Informasi Lain --}}
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-bold text-gray-700 mb-4">Informasi Lainnya</h3>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Jadwal Pemesanan :</span>
                        <span class="font-medium text-gray-800">{{ $rating->jadwal_pemesanan ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Jadwal Layanan :</span>
                        <span class="font-medium text-gray-800">{{ $rating->jadwal_layanan ?? '-' }}</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
