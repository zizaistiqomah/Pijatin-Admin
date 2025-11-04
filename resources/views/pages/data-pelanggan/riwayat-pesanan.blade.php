@extends('layouts.app')
@section('navtitle', 'Riwayat Pesanan')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen">
    <!-- Header Judul -->
    <div class="mt-[14px] ml-[26px] mr-[26px] px-6 py-20 bg-[#EBFFF2] flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <h2 class="text-xl font-bold text-gray-700">
                Riwayat Pesanan - {{ $pelanggan->nama }}
            </h2>

            {{-- Ikon gender --}}
            @if(strtolower($pelanggan->gender) === 'laki-laki')
                <div class="bg-blue-100 text-blue-600 p-1 rounded-full w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 7h3a1 1 0 100-2h-3V2a1 1 0 10-2 0v3H8a1 1 0 000 2h3v3a4 4 0 11-2-3.465V5H8a5 5 0 104.546 6.032A3.978 3.978 0 0013 10V7z"/>
                    </svg>
                </div>
            @elseif(strtolower($pelanggan->gender) === 'perempuan')
                <div class="bg-pink-100 text-pink-600 p-1 rounded-full w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a5 5 0 00-1 9.9V14H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2v-2.1A5 5 0 0010 2zm0 8a3 3 0 110-6 3 3 0 010 6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            @endif
        </div>
    </div>

    {{-- Tab Header --}}
    <div class="flex text-sm font-semibold mb-0 relative z-10 ml-[50px] mr-[50px] mt-[-60px]">
        <button id="tab-transfer-btn" class="w-32 py-3 rounded-t-xl bg-white text-emerald-600 z-20 relative">
            Transfer
        </button>
        <button id="tab-cash-btn"
            class="w-32 py-3 rounded-t-xl bg-gray-200 text-gray-400 z-10 -ml-6 relative after:absolute after:top-0 after:left-0 after:w-6 after:h-full after:bg-gray-100 after:z-[-1]">
            Cash
        </button>
    </div>

    {{-- Container --}}
    <div class="bg-white shadow border-gray-200 rounded-b-xl rounded-tr-xl overflow-hidden ml-[50px] mr-[50px]">
        <div class="bg-white rounded-2xl shadow-lg p-6">

            {{-- Search --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex w-[320px]">
                    <input
                        type="text"
                        placeholder="Cari nomor id, nama, layanan, dll"
                        class="flex-grow px-4 py-2.5 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring focus:ring-emerald-200"/>
                    <button class="bg-[#469D89] hover:bg-[#378877] text-white px-4 py-2 rounded-r-lg flex items-center justify-center transition-colors">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0.75C12.0041 0.75 15.25 3.99594 15.25 8C15.25 9.7319 14.6427 11.3219 13.6295 12.5688L18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2641 18.7966 17.8474 18.8208 17.5538 18.6029L17.4697 18.5303L12.5688 13.6295C11.3219 14.6427 9.7319 15.25 8 15.25C3.99594 15.25 0.75 12.0041 0.75 8C0.75 3.99594 3.99594 0.75 8 0.75ZM8 2.25C4.82436 2.25 2.25 4.82436 2.25 8C2.25 11.1756 4.82436 13.75 8 13.75C11.1756 13.75 13.75 11.1756 13.75 8C13.75 4.82436 11.1756 2.25 8 2.25Z"
                                fill="white"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- TAB TRANSFER --}}
            <div id="tab-transfer" class="tab-content">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-[#469D89] text-white">
                        <tr>
                            <th class="p-3 font-semibold">#</th>
                            <th class="p-3 font-semibold">Nama Terapis</th>
                            <th class="p-3 font-semibold">Jenis Layanan</th>
                            <th class="p-3 font-semibold">Jadwal Layanan</th>
                            <th class="p-3 font-semibold">Status Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($riwayat as $r)
                            @if ($r['metode'] === 'Transfer')
                                <tr class="odd:bg-white even:bg-[#EBFFF2]">
                                    <td class="px-4 py-3">{{ $no++ }}</td>
                                    <td class="px-4 py-3 flex items-center">
                                        @if (strtolower($r['terapis']['gender']) === 'perempuan')
                                            {{-- Icon perempuan (pink) --}}
                                            <div class="bg-pink-100 text-pink-600 p-1 rounded-full w-5 h-5 flex justify-center items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 2a5 5 0 00-1 9.9V14H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2v-2.1A5 5 0 0010 2zm0 8a3 3 0 110-6 3 3 0 010 6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        @else
                                        {{-- Icon laki-laki (biru) --}}
                                            <div class="bg-blue-100 text-blue-600 p-1 rounded-full w-5 h-5 flex justify-center items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                                                    <!-- Lingkaran utama -->
                                                    <circle cx="192" cy="320" r="128" fill="none" stroke="currentColor" stroke-width="40"/>
                                                    <!-- Panah ke kanan atas -->
                                                    <line x1="290" y1="222" x2="464" y2="48" stroke="currentColor" stroke-width="40" stroke-linecap="round"/>
                                                    <!-- Kepala panah -->
                                                    <line x1="384" y1="48" x2="464" y2="48" stroke="currentColor" stroke-width="40" stroke-linecap="round"/>
                                                    <line x1="464" y1="48" x2="464" y2="128" stroke="currentColor" stroke-width="40" stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                            </div>
                                        @endif
                                        {{ $r['terapis']['nama'] }}
                                    </td>
                                    <td class="px-4 py-3">Full Body Massage</td>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($r['tanggal'])->format('d M Y') }}</td>
                                    <td class="px-4 py-3">
                                        @if ($r['status'] === 'Dibatalkan')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">
                                                <span class="w-2 h-2 mr-2 rounded-full bg-red-500"></span>{{ $r['status'] }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#C5F2DC] text-[#147D6A]">
                                                <span class="w-2 h-2 mr-2 rounded-full bg-[#469D89]"></span>{{ $r['status'] }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- TAB CASH --}}
            <div id="tab-cash" class="tab-content hidden">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-[#469D89] text-white">
                        <tr>
                            <th class="p-3 font-semibold">#</th>
                            <th class="p-3 font-semibold">Nama Terapis</th>
                            <th class="p-3 font-semibold">Jenis Layanan</th>
                            <th class="p-3 font-semibold">Jadwal Layanan</th>
                            <th class="p-3 font-semibold">Status Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($riwayat as $r)
                            @if ($r['metode'] === 'Cash')
                                <tr class="odd:bg-white even:bg-[#EBFFF2]">
                                    <td class="px-4 py-3">{{ $no++ }}</td>
                                    <td class="px-4 py-3 flex items-center">
                                        @if (strtolower($r['terapis']['gender']) === 'perempuan')
                                            {{-- Icon perempuan (pink) --}}
                                            <div class="bg-pink-100 text-pink-600 p-1 rounded-full w-5 h-5 flex justify-center items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 2a5 5 0 00-1 9.9V14H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2v-2.1A5 5 0 0010 2zm0 8a3 3 0 110-6 3 3 0 010 6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        @else
                                        {{-- Icon laki-laki (biru) --}}
                                            <div class="bg-blue-100 text-blue-600 p-1 rounded-full w-5 h-5 flex justify-center items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                                                    <!-- Lingkaran utama -->
                                                    <circle cx="192" cy="320" r="128" fill="none" stroke="currentColor" stroke-width="40"/>
                                                    <!-- Panah ke kanan atas -->
                                                    <line x1="290" y1="222" x2="464" y2="48" stroke="currentColor" stroke-width="40" stroke-linecap="round"/>
                                                    <!-- Kepala panah -->
                                                    <line x1="384" y1="48" x2="464" y2="48" stroke="currentColor" stroke-width="40" stroke-linecap="round"/>
                                                    <line x1="464" y1="48" x2="464" y2="128" stroke="currentColor" stroke-width="40" stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                            </div>
                                        @endif
                                        {{ $r['terapis']['nama'] }}
                                    </td>
                                    <td class="px-4 py-3">Hot Stone Message</td>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($r['tanggal'])->format('d M Y') }}</td>
                                    <td class="px-4 py-3">
                                        @if ($r['status'] === 'Dibatalkan')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">
                                                <span class="w-2 h-2 mr-2 rounded-full bg-red-500"></span>{{ $r['status'] }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#C5F2DC] text-[#147D6A]">
                                                <span class="w-2 h-2 mr-2 rounded-full bg-[#469D89]"></span>{{ $r['status'] }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Script Switch Tab --}}
<script>
    const transferBtn = document.getElementById('tab-transfer-btn');
    const cashBtn = document.getElementById('tab-cash-btn');
    const transferTab = document.getElementById('tab-transfer');
    const cashTab = document.getElementById('tab-cash');

    transferBtn.addEventListener('click', () => {
        transferTab.classList.remove('hidden');
        cashTab.classList.add('hidden');
        transferBtn.classList.add('bg-white', 'text-emerald-600');
        cashBtn.classList.add('bg-gray-200', 'text-gray-400');
        transferBtn.classList.remove('bg-gray-200', 'text-gray-400');
        cashBtn.classList.remove('bg-white', 'text-emerald-600');
    });

    cashBtn.addEventListener('click', () => {
        cashTab.classList.remove('hidden');
        transferTab.classList.add('hidden');
        cashBtn.classList.add('bg-white', 'text-emerald-600');
        transferBtn.classList.add('bg-gray-200', 'text-gray-400');
        cashBtn.classList.remove('bg-gray-200', 'text-gray-400');
        transferBtn.classList.remove('bg-white', 'text-emerald-600');
    });
</script>
@endsection
