@extends('layouts.app')

@section('title', 'Data Akun Pelanggan')
@section('page-title', 'Data Akun Pelanggan')
@section('navtitle', 'Pelanggan')

@section('content')
<div class="container mx-auto px-4 py-20">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Data Akun Pelanggan</h2>

        <div class="flex items-center justify-between mb-4">
            <div class="relative w-full max-w-md">
                <input type="text" placeholder="Cari nomor id, nama, kota, dll" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md text-sm">
                <div class="absolute right-3 top-2.5 text-gray-400">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM14 8a6 6 0 11-12 0 6 6 0 0112 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <button class="ml-4 px-4 py-2 border border-gray-300 text-sm rounded-md flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2H3V4zm0 4h18v12a1 1 0 01-1 1H4a1 1 0 01-1-1V8z"/>
                </svg>
                Filter
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="border-b">
                    <tr class="text-left">
                        <th class="py-2 px-4 font-semibold">Nomor ID</th>
                        <th class="py-2 px-4 font-semibold">Nama Lengkap</th>
                        <th class="py-2 px-4 font-semibold">Tanggal Lahir</th>
                        <th class="py-2 px-4 font-semibold">Email</th>
                        <th class="py-2 px-4 font-semibold">Jenis Kelamin</th>
                        <th class="py-2 px-4 font-semibold">Kota/Kabupaten</th>
                        <th class="py-2 px-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ([
                        ['CTS008726', 'Dandia Rianti', '18 Jan 1998', 'dandia.rianti@gmail.com', 'Perempuan', 'Jakarta Timur'],
                        ['CTS005244', 'Santi Martini', '22 Sep 1999', 'santimartini@gmail.com', 'Perempuan', 'Jakarta Timur'],
                        ['CTS006219', 'Tono Winarto', '20 Nov 1985', 'tonowik@gmail.com', 'Laki-Laki', 'Jakarta Selatan'],
                    ] as $row)
                    <tr class="border-b">
                        @foreach ($row as $cell)
                        <td class="py-2 px-4">{{ $cell }}</td>
                        @endforeach
                        <td class="py-2 px-4 space-x-2">
                            <a href="#" class="text-blue-500">
                                <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-yellow-500">
                                <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-1 5h2v6h-2V7zm0 8h2v2h-2v-2z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-red-500">
                                <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center text-sm">
            <span class="text-gray-500">Halaman 1 dari 53</span>
            <div class="flex space-x-1">
                <button class="px-3 py-1 rounded border bg-[#2A9D8F] text-white">1</button>
                <button class="px-3 py-1 rounded border">2</button>
                <button class="px-3 py-1 rounded border">3</button>
                <button class="px-3 py-1 rounded border">...</button>
                <button class="px-3 py-1 rounded border">53</button>
                <button class="px-3 py-1 rounded border">&gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection
