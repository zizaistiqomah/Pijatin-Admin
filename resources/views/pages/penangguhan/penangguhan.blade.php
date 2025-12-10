@extends('layouts.app')
@section('navtitle', 'Data Penangguhan')

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
                        placeholder="Cari nama, komentar, dll"
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

            {{-- Tabel Data Rating --}}
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
                    @forelse ($penangguhan as $index => $r)
                        <tr class="hover:bg-gray-50">

                            {{-- Nomor --}}
                            <td class="px-4 py-2">{{ $ulasan->firstItem() + $index }}</td>

                            {{-- Nama Terapis --}}
                            <td class="px-4 py-2">{{ $r->terapis->nama ?? '-' }}</td>

                            {{-- Jenis Layanan --}}
                            <td class="px-4 py-2">{{ $r->jenis_layanan ?? '-' }}</td>

                            {{-- Jadwal Layanan --}}
                            <td class="px-4 py-2">
                                {{ $r->jadwal_layanan ? \Carbon\Carbon::parse($r->jadwal_layanan)->format('d M Y H:i') : '-' }}
                            </td>

                            {{-- Rating --}}
                            <td class="px-4 py-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $r->score)
                                        {{-- Bintang Penuh --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="#FACC15" class="w-5 h-5 inline-block">
                                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.868 1.48 8.276L12 18.897l-7.416 4.553 
                                                1.48-8.276L0 9.306l8.332-1.151z"/>
                                        </svg>
                                    @else
                                        {{-- Bintang Kosong --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="#D1D5DB" stroke-width="2"
                                            class="w-5 h-5 inline-block">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.063 6.34
                                                6.708.073c.969.011 1.37 1.24.588 1.81l-5.37 3.982
                                                2.007 6.275c.286.896-.755 1.637-1.54 1.108L12 
                                                18.347l-5.407 3.168c-.784.529-1.825-.212-1.54-1.108
                                                l2.007-6.275-5.37-3.982c-.781-.57-.38-1.799.588-1.81
                                                l6.708-.073 2.063-6.34z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </td>



                            {{-- Aksi --}}
                            <td class="px-4 py-2 flex gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('data-terapis.rating-detail', $r->id) }}"
                                   class="text-blue-600 hover:underline">
                                    <img src="{{ asset('images/detail-icon.png') }}" alt="Detail" class="h-6 w-6">
                                </a>

                                {{-- Form Delete (dipanggil oleh modal) --}}
                                <form id="delete-form-{{ $r->id }}"
                                      action="{{ route('data-terapis.rating.delete', $r->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                {{-- Tombol Hapus membuka modal --}}
                                <button type="button"
                                        onclick="openDeleteModal('{{ $r->id }}', '{{ $r->nama }}')">
                                    <img src="{{ asset('images/trash-can.svg') }}" alt="Delete" class="h-6 w-6">
                                </button>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-4 text-gray-500">Tidak ada ulasan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- Modal Delete --}}
<div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-xl shadow-xl w-96 text-center">
        <img src="{{ asset('images/trash-can.svg') }}" alt="Delete" class="h-20 w-20 mx-auto mb-4">
        <h2 class="text-lg font-semibold mb-2">Hapus Rating</h2>
        <p class="text-gray-600 mb-6">
            Apakah anda yakin ingin menghapus rating ini?
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
