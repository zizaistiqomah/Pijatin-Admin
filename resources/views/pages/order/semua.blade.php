@extends('layouts.app')
@section('navtitle', 'Order')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen">
    <!-- Header Judul -->
    <div class="mt-[14px] ml-[26px] mr-[26px] px-6 py-20 bg-[#EBFFF2] flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-700">Semua</h2>
    </div>

    {{-- Tab Header --}}
    <div class="flex text-sm font-semibold mb-0 relative z-10 ml-[50px] mr-[50px] mt-[-60px]">
        <button id="tab-dikonfirmasi-btn" class="w-32 py-3 rounded-t-xl bg-white text-emerald-600 z-20 relative">
            Dikonfirmasi
        </button>
        <button id="tab-dibatalkan-btn"
            class="w-40 py-3 rounded-t-xl bg-gray-200 text-gray-400 z-10 -ml-6 relative after:absolute after:top-0 after:left-0 after:w-6 after:h-full after:bg-gray-100 after:z-[-1]">
            Dibatalkan
        </button>
    </div>

    {{-- Container --}}
    <div class="bg-white shadow border-gray-200 rounded-b-xl rounded-tr-xl overflow-hidden ml-[50px] mr-[50px]">
        <div class="bg-white rounded-2xl shadow-lg p-6">

            {{-- Search --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex w-[300px] max-w-2xl">
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari id, jenis layanan, dll"
                        class="flex-grow px-4 py-2.5 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring focus:ring-blue-200"/>
                    <button onclick="performSearch()" class="bg-[#469D89] hover:bg-[#378877] text-white px-4 py-2 rounded-r-lg flex items-center justify-center transition-colors">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 0.75C12.0041 0.75 15.25 3.99594 15.25 8C15.25 9.7319 14.6427 11.3219 13.6295 12.5688L18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2641 18.7966 17.8474 18.8208 17.5538 18.6029L17.4697 18.5303L12.5688 13.6295C11.3219 14.6427 9.7319 15.25 8 15.25C3.99594 15.25 0.75 12.0041 0.75 8C0.75 3.99594 3.99594 0.75 8 0.75ZM8 2.25C4.82436 2.25 2.25 4.82436 2.25 8C2.25 11.1756 4.82436 13.75 8 13.75C11.1756 13.75 13.75 11.1756 13.75 8C13.75 4.82436 11.1756 2.25 8 2.25Z"
                            fill="white"
                        />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Tab Dikonfirmasi --}}
            <div id="tab-dikonfirmasi" class="tab-content">
                <table class="w-full text-sm text-left">
                    <thead class="text-semi bold bg-[#469D89] text-white">
                        <tr>
                            <th class="p-2">#</th>
                            <th class="p-2">Nama Pemesan</th>
                            <th class="p-2">Jenis Layanan</th>
                            <th class="p-2">Jadwal Layanan</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->where('status', 'dikonfirmasi') as $index => $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $order->nama_pemesan }}</td>
                                <td class="px-4 py-2">{{ $order->jenis_layanan }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($order->jadwal_layanan)->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2 text-green-600 font-semibold">{{ ucfirst($order->status) }}</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <a href="{{ route('order.detail', $order->id) }}" class="text-blue-500 hover:underline">Detail</a>
                                    <form action="{{ route('order.delete', $order->id) }}" method="POST" onsubmit="return confirm('Yakin hapus order ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tab Dibatalkan --}}
            <div id="tab-dibatalkan" class="tab-content hidden">
                <table class="w-full text-sm text-left">
                    <thead class="text-semi bold bg-[#469D89] text-white">
                        <tr>
                            <th class="p-2">#</th>
                            <th class="p-2">Nama Pemesan</th>
                            <th class="p-2">Jenis Layanan</th>
                            <th class="p-2">Jadwal Layanan</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->where('status', 'dibatalkan') as $index => $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $order->nama_pemesan }}</td>
                                <td class="px-4 py-2">{{ $order->jenis_layanan }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($order->jadwal_layanan)->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2 text-red-600 font-semibold">{{ ucfirst($order->status) }}</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <a href="{{ route('order.detail', $order->id) }}" class="text-blue-500 hover:underline">Detail</a>
                                    <form action="{{ route('order.delete', $order->id) }}" method="POST" onsubmit="return confirm('Yakin hapus order ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- Script Switch Tab --}}
<script>
    const dikonfirmasiBtn = document.getElementById('tab-dikonfirmasi-btn');
    const dibatalkanBtn = document.getElementById('tab-dibatalkan-btn');
    const dikonfirmasiTab = document.getElementById('tab-dikonfirmasi');
    const dibatalkanTab = document.getElementById('tab-dibatalkan');

    dikonfirmasiBtn.addEventListener('click', () => {
        dikonfirmasiTab.classList.remove('hidden');
        dibatalkanTab.classList.add('hidden');
        dikonfirmasiBtn.classList.add('bg-white', 'text-emerald-600');
        dikonfirmasiBtn.classList.remove('bg-gray-200', 'text-gray-400');
        dibatalkanBtn.classList.remove('bg-white', 'text-emerald-600');
        dibatalkanBtn.classList.add('bg-gray-200', 'text-gray-400');
    });

    dibatalkanBtn.addEventListener('click', () => {
        dibatalkanTab.classList.remove('hidden');
        dikonfirmasiTab.classList.add('hidden');
        dibatalkanBtn.classList.add('bg-white', 'text-emerald-600');
        dibatalkanBtn.classList.remove('bg-gray-200', 'text-gray-400');
        dikonfirmasiBtn.classList.remove('bg-white', 'text-emerald-600');
        dikonfirmasiBtn.classList.add('bg-gray-200', 'text-gray-400');
    });
</script>
@endsection
