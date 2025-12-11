@extends('layouts.app')
@section('navtitle', 'Suspended')

@section('content')
<div class="bg-[#EBFFF2] min-h-screen">
    <!-- Header Judul -->
    <div class="mt-[14px] ml-[26px] mr-[26px] px-6 py-20 bg-[#EBFFF2]  flex justify-between items-center">
        <h2 class="text-xl  font-bold text-gray-700">Data Akun Suspended</h2>
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
                        placeholder="Cari nama, tipe akun, dll"
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

        <!-- Table -->
            <table class="w-full text-sm text-left">
                <thead class="text-semi bold bg-[#469D89] text-white">
                    <tr>
                        <th class="p-2">#</th>
                        <th class="p-2">Nama Lengkap</th>
                        <th class="p-2">Jenis Kelamin</th>
                        <th class="p-2">Tipe Pengguna</th>
                        <th class="p-2">Tanggal</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>

            <tbody>
                @foreach ($data as $i => $item)
                <tr class="{{ $i % 2 == 0 ? 'bg-[#EBFFF2]' : 'bg-white' }}">
                    <td class="p-3">{{ $i + 1 }}</td>
                    <td class="p-3">{{ $item->nama }}</td>
                    <td class="p-3">{{ $item->jenis_kelamin }}</td>

                    <td class="p-3">
                        <span class="px-3 py-1 rounded-lg text-white text-xs
                            {{ $item->tipe_pengguna == 'Terapis' ? 'bg-blue-500' : 'bg-teal-500' }}">
                            {{ $item->tipe_pengguna }}
                        </span>
                    </td>

                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </td>

                    <td class="p-3">
                        <span class="px-3 py-1 rounded-lg text-xs
                            @if($item->status == 'Permanen') bg-red-500 text-white
                            @elseif($item->status == '7 hari') bg-yellow-300 text-black
                            @elseif($item->status == '14 hari') bg-orange-400 text-black
                            @elseif($item->status == '30 hari') bg-orange-600 text-white
                            @else bg-gray-300 text-black
                            @endif
                        ">
                            {{ $item->status }}
                        </span>
                    </td>

                    
                    <td class="px-4 py-2 flex gap-3 justify-center">
                    
                    {{-- Detail --}}
                    <a href="{{ route('suspended.show', $item->id) }}"
                    class="text-blue-600 hover:underline">
                        <img src="{{ asset('images/detail-icon.png') }}" alt="Detail" class="h-6 w-6">
                    </a>

                    {{-- Form Delete --}}
                    <form id="delete-form-{{ $item->id }}"
                        action="{{ route('suspended.destroy', $item->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                    {{-- Tombol Hapus membuka modal --}}
                    <button type="button"
                            onclick="openDeleteModal('{{ $item->id }}')">
                        <img src="{{ asset('images/trash-can.svg') }}" alt="Delete" class="h-6 w-6">
                    </button>

                </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($data->count() == 0)
        <p class="text-center text-gray-500 py-5">Belum ada data akun suspended.</p>
        @endif

    </div>
</div>
{{-- Modal Delete --}}
<div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-xl shadow-xl w-96 text-center">
        <img src="{{ asset('images/trash-can.svg') }}" alt="Delete" class="h-20 w-20 mx-auto mb-4">

        <h2 class="text-lg font-semibold mb-2">Hapus Akun Suspended</h2>

        <p class="text-gray-600 mb-6">
            Apakah Anda yakin ingin menghapus data ini?
        </p>

        <div class="flex justify-center space-x-4">
            <button id="delete-confirm"
                class="bg-[#469D89] text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Hapus
            </button>

            <button type="button" id="delete-cancel"
                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Batal
            </button>
        </div>
    </div>
</div>

{{-- Script Modal --}}
<script>
    let deleteId = null;

    function openDeleteModal(id) {
        deleteId = id;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    document.getElementById('delete-cancel').addEventListener('click', () => {
        document.getElementById('delete-modal').classList.add('hidden');
        deleteId = null;
    });

    document.getElementById('delete-confirm').addEventListener('click', () => {
        if (deleteId) {
            document.getElementById('delete-form-' + deleteId).submit();
        }
    });
</script>

@endsection
