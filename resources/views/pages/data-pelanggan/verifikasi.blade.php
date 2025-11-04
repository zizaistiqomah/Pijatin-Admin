@extends('layouts.app')
@section('navtitle', 'Data Akun Verifikasi')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen">
    <!-- Header Judul -->
    <div class="mt-[14px] ml-[26px] mr-[26px] px-6 py-20 bg-[#EBFFF2] flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-700">Data Akun Verifikasi</h2>
    </div>

    {{-- Container --}}
    <div class="bg-white shadow border-gray-200 rounded-xl overflow-hidden ml-[50px] mr-[50px] -mt-10">
        <div class="bg-white rounded-2xl shadow-lg p-6">

            {{-- Search --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex w-[300px] max-w-2xl">
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari nama, ponsel, dll"
                        class="flex-grow px-4 py-2.5 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring focus:ring-blue-200"/>
                    <button onclick="performSearch()" class="bg-[#469D89] hover:bg-[#378877] text-white px-4 py-2 rounded-r-lg flex items-center justify-center transition-colors">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0.75C12.0041 0.75 15.25 3.99594 15.25 8C15.25 9.7319 14.6427 11.3219 13.6295 12.5688L18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2641 18.7966 17.8474 18.8208 17.5538 18.6029L17.4697 18.5303L12.5688 13.6295C11.3219 14.6427 9.7319 15.25 8 15.25C3.99594 15.25 0.75 12.0041 0.75 8C0.75 3.99594 3.99594 0.75 8 0.75ZM8 2.25C4.82436 2.25 2.25 4.82436 2.25 8C2.25 11.1756 4.82436 13.75 8 13.75C11.1756 13.75 13.75 11.1756 13.75 8C13.75 4.82436 11.1756 2.25 8 2.25Z"
                                fill="white"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Tabel Data Akun Verifikasi --}}
            @if ($pelanggan->isEmpty())
                <div class="text-center text-gray-500 py-6">
                    Tidak ada akun yang menunggu verifikasi.
                </div>
            @else
                <table class="w-full text-sm text-left">
                    <thead class="bg-[#469D89] text-white font-semibold">
                        <tr>
                            <th class="p-2">#</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Jenis Kelamin</th>
                            <th class="p-2">No Ponsel</th>
                            <th class="p-2">Tanggal Bergabung</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $index => $t)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $t->nama }}</td>
                                <td class="px-4 py-2">{{ $t->jenis_kelamin }}</td>
                                <td class="px-4 py-2">{{ $t->ponsel }}</td>
                                <td class="px-4 py-2">
                                    {{ $t->tanggal_bergabung 
                                        ? \Carbon\Carbon::parse($t->tanggal_bergabung)->translatedFormat('d F Y') 
                                        : ($t->created_at ? \Carbon\Carbon::parse($t->created_at)->translatedFormat('d F Y') : '-') }}
                                </td>

                                {{-- STATUS dengan badge + dot --}}
                               <td class="px-4 py-2">
                                    @php
                                        $statusColors = [
                                            'menunggu' => 'bg-yellow-200 text-yellow-700',
                                            'terverifikasi' => 'bg-green-200 text-green-700',
                                            'ditolak' => 'bg-red-100 text-red-700',
                                        ];
                                        $dotColors = [
                                            'menunggu' => 'bg-yellow-600',
                                            'terverifikasi' => 'bg-green-600',
                                            'ditolak' => 'bg-red-500',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $statusColors[$t->status] ?? 'bg-gray-200 text-gray-700' }}">
                                        <span class="w-2 h-2 mr-2 rounded-full {{ $dotColors[$t->status] ?? 'bg-gray-500' }}"></span>
                                        {{ ucfirst($t->status) }}
                                    </span>
                                </td>

                                <td class="px-4 py-2">
                                    <a href="{{ route('pages.data-pelanggan.verifikasi.detail', $t->id) }}" 
                                        class="text-blue-500 hover:text-blue-700 flex items-center space-x-1">
                                        <img src="{{ asset('images/detail-icon.png') }}" alt="Detail" class="h-6 w-6">
                                        <span>Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection
