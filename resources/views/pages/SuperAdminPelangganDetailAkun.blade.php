@extends('layouts.app')

@section('title', 'Detail Akun Pelanggan')
@section('page-title', 'Detail Akun Pelanggan')
@section('navtitle')    
    <div class="text-medium text-gray-600 mb-4">
        <a href="#" class="text-gray-800 hover:underline">Pelanggan</a>
        <span class="mx-2">></span>
        <a href="#" class="text-emerald-600 hover:underline">Detail Akun</a>
    </div> 
@endsection

@section('content')
<div class="px-4 py-20 text-sm">
    <nav class="text-xs text-gray-500 mb-3">
        <a href="#" class="hover:underline">Pelanggan</a> &gt; 
        <span class="text-gray-800 font-medium">Detail Akun</span>
    </nav>

    <h2 class="text-base font-bold mb-4">Detail Akun Pelanggan</h2>

    <div class="grid grid-cols-12 gap-4 mb-4 ">
        {{-- Card Informasi Akun --}}
        <div class="col-span-6 lg:col-span-8 bg-white rounded-lg shadow p-4 space-y-10">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-3 ">
                    <img src="https://i.pinimg.com/736x/f6/61/ea/f661ea61616909838a9fbfeda0d2ea14.jpg" alt="Foto" class="w-24 h-24 rounded-full object-cover">
                    <div>
                        <h3 class="text-sm font-semibold flex items-center gap-1">
                            Cella Joepit 
                            @php
                                $gender = 'Perempuan'; 
                            @endphp

                            @if(strtolower($gender) === 'laki-laki')
                                <span class="text-blue-500 text-base">♂️</span>
                            @elseif(strtolower($gender) === 'perempuan')
                                <span class="text-pink-500 text-base">♀️</span>
                            @endif
                        </h3>
                        <span class="text-xs text-primary text-emerald-500 font-medium">Pelanggan</span>
                    </div>
                </div>

                <div class="text-xs font-semibold text-gray-500">#CTS008726</div>
            </div>

            <div class="space-y-4 mb-3 text-xs text-gray-500 ">
                <div class="flex justify-between">
                    <span>Status Akun:</span>
                    <span class="text-lime-500 font-medium">Tidak dalam Penangguhan</span>
                </div>
                <div class="flex justify-between">
                    <span>Alamat Email:</span>
                    <span class="text-gray-900 font-medium">cellaon1@gmail.com</span>
                </div>
                <div class="flex justify-between">
                    <span>Nomor Telepon:</span>
                    <span class="text-gray-900 font-medium">087989373368</span>
                </div>
                <div class="flex justify-between">
                    <span>Alamat:</span>
                    <span class="text-gray-900 font-medium text-right">Kecamatan Bulu, Temanggung 13320, Jawa Tengah</span>
                </div>
            </div>

            <div class="flex justify-end mt-3 space-x-2">
                <button class="px-3 py-1 border border-emerald-500 text-emerald-600 text-xs font-medium rounded hover:bg-emerald-50">Verifikasi</button>
                <button class="px-3 py-1 border border-red-400 text-red-500 text-xs font-medium rounded hover:bg-red-50">Tangguhkan Akun</button>
                <button class="px-3 py-1 border border-yellow-400 text-yellow-500 text-xs font-medium rounded hover:bg-yellow-50">Kirim Peringatan</button>
            </div>
        </div>

        {{-- Card Identitas Diri --}}
        <div class="col-span-6 lg:col-span-4 bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-start mb-3 space-y-5">
                <h4 class="font-bold text-gray-700 text-sm">Identitas Diri</h4>
                <button class="px-3 py-1 text-xs text-blue-600 border border-blue-500 font-medium rounded hover:bg-blue-50">Lihat Foto KTP</button>
            </div>
            <div class="space-y-4 mb-4 text-xs text-gray-500">
                <div class="flex justify-between">
                    <span>NIK:</span>
                    <span class="text-gray-900 font-medium">3171895833291145</span>
                </div>
                <div class="flex justify-between">
                    <span>Nama Lengkap:</span>
                    <span class="text-gray-900 font-medium">Cella Joepit</span>
                </div>
                <div class="flex justify-between">
                    <span>Jenis Kelamin:</span>
                    <span class="text-gray-900 font-medium">Perempuan</span>
                </div>
            </div>

            <div class="flex justify-between items-start mb-3 space-y-5">
                <h4 class="font-bold text-gray-700 text-sm">Informasi Lainnya</h4>
            </div>
            <div class="space-y-4 text-xs text-gray-500">
                <div class="flex justify-between">
                    <span>Tanggal Bergabung:</span>
                    <span class="text-gray-900 font-medium">18 September 2023</span>
                </div>
                <div class="flex justify-between">
                    <span>Total Layanan:</span>
                    <span class="text-gray-900 font-medium">15 Layanan</span>
                </div>
                <div class="flex justify-between">
                    <span>Total Dibatalkan:</span>
                    <span class="text-gray-900 font-medium">2 Layanan</span>
                </div>
                <div class="flex justify-between">
                    <span>Peringatan Diterima:</span>
                    <span class="text-gray-900 font-medium">1x Peringatan</span>
                </div>
            </div>
        </div>
    </div>


        {{--Transaksi--}}
            <h2 class="text-base font-bold mb-4">Riwayat Pesanan</h2>

        <div class="bg-white rounded-xl p-4 shadow text-[11px]">

        <div class="mb-4">
            {{-- Tab --}}
            <div class="flex border-b border-gray-200 w-fit mb-2">
                <button id="tab-transfer" onclick="switchTab('transfer')" class="px-3 pb-1 font-semibold text-emerald-600 border-b-2 border-emerald-600">Transfer</button>
                <button id="tab-cash" onclick="switchTab('cash')" class="px-3 pb-1 font-semibold text-gray-400 hover:text-gray-600">Cash</button>
            </div>

            {{-- Search dan Filter --}}
            <div class="flex items-center gap-2">
                <div class="relative flex-1 max-w-xs">
                    <input type="text" placeholder="Cari nomor id, nama, kota, dll" class="w-full border border-gray-300 rounded-md pl-3 pr-9 py-1.5 focus:outline-none text-[11px]">
                    <svg class="w-4 h-4 absolute right-2 top-2.5 text-white bg-[#44BBA4] rounded p-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.41-1.41l4.39 4.39-1.41 1.41-4.39-4.39zM8 14A6 6 0 108 2a6 6 0 000 12z" clip-rule="evenodd" />
                    </svg>
                </div>

                <button class="ml-auto border border-gray-300 rounded-md px-3 py-1 text-xs flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M4 10h16M5 16h14M6 22h12" />
                    </svg>
                    Filter
                </button>
            </div>
        </div>


            {{-- Tab Contents --}}
            <div id="content-transfer">
                <div class="overflow-auto">
                    <table class="w-full text-[11px]">
                        <thead class="text-gray-500 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-1">ID Pesanan</th>
                                <th class="text-left py-1">Nama Terapis</th>
                                <th class="text-left py-1">Jenis Layanan</th>
                                <th class="text-left py-1">Jadwal Layanan</th>
                                <th class="text-left py-1">Jumlah Pesanan</th>
                                <th class="text-left py-1">Status Layanan</th>
                                <th class="text-left py-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            <tr class="border-b border-gray-100">
                                <td class="py-2">L01230523</td>
                                <td class="py-2 flex items-center gap-1"><span class="text-pink-500 text-lg">♀️</span> Salma Rifqya</td>
                                <td class="py-2">Full Body Massage</td>
                                <td class="py-2">29 Nov 2023</td>
                                <td class="py-2">1 Orang</td>
                                <td class="py-2">
                                    <span class="text-red-500 bg-red-100 px-2 py-0.5 rounded-full text-[10px]">Dibatalkan</span>
                                </td>
                                <td class="py-2 space-x-1">
                                    <button class="text-primary text-xs"><i class="fas fa-eye text-[#44BBA4]"></i></button>
                                    <button class="text-red-500 text-xs"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-2">L02301123</td>
                                <td class="py-2 flex items-center gap-1"><span class="text-pink-500 text-lg">♀️</span> Winda Harmoni</td>
                                <td class="py-2">Hot Stone Massage</td>
                                <td class="py-2">29 Nov 2023</td>
                                <td class="py-2">2 Orang</td>
                                <td class="py-2">
                                    <span class="text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full text-[10px]">Selesai</span>
                                </td>
                                <td class="py-2 space-x-1">
                                    <button class="text-primary text-xs"><i class="fas fa-eye text-[#44BBA4]"></i></button>
                                    <button class="text-red-500 text-xs"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">L01170923</td>
                                <td class="py-2 flex items-center gap-1"><span class="text-pink-500 text-lg">♀️</span> Umi Sarimi</td>
                                <td class="py-2">Full Body Massage</td>
                                <td class="py-2">29 Nov 2023</td>
                                <td class="py-2">1 Orang</td>
                                <td class="py-2">
                                    <span class="text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full text-[10px]">Selesai</span>
                                </td>
                                <td class="py-2 space-x-1">
                                    <button class="text-primary text-xs"><i class="fas fa-eye text-[#44BBA4]"></i></button>
                                    <button class="text-red-500 text-xs"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                {{-- Pagination --}}
                <div class="flex justify-between items-center mt-4 text-[10px] text-gray-600">
                    <span>Halaman 1 dari 200</span>
                    <div class="flex space-x-1">
                        <button class="px-2 py-1 rounded bg-[#44BBA4] text-white">1</button>
                        <button class="px-2 py-1 rounded bg-gray-100">2</button>
                        <button class="px-2 py-1 rounded bg-gray-100">3</button>
                        <span class="px-1">...</span>
                        <button class="px-2 py-1 rounded bg-gray-100">200</button>
                    </div>
                </div>
            </div>

            {{-- Cash Tab Content --}}
            <div id="content-cash" class="hidden">
                <div class="overflow-auto">
                    <table class="w-full text-[11px]">
                        <thead class="text-gray-500 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-1">ID Pesanan</th>
                                <th class="text-left py-1">Nama Terapis</th>
                                <th class="text-left py-1">Jenis Layanan</th>
                                <th class="text-left py-1">Jadwal Layanan</th>
                                <th class="text-left py-1">Jumlah Pesanan</th>
                                <th class="text-left py-1">Status Layanan</th>
                                <th class="text-left py-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            <tr class="border-b border-gray-100">
                                <td class="py-2">L01230523</td>
                                <td class="py-2 flex items-center gap-1"><span class="text-pink-500 text-lg">♀️</span> Salma Rifqya</td>
                                <td class="py-2">Full Body Massage</td>
                                <td class="py-2">29 Nov 2023</td>
                                <td class="py-2">1 Orang</td>
                                <td class="py-2">
                                    <span class="text-red-500 bg-red-100 px-2 py-0.5 rounded-full text-[10px]">Dibatalkan</span>
                                </td>
                                <td class="py-2 space-x-1">
                                    <button class="text-primary text-xs"><i class="fas fa-eye text-[#44BBA4]"></i></button>
                                    <button class="text-red-500 text-xs"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-2">L02301123</td>
                                <td class="py-2 flex items-center gap-1"><span class="text-pink-500 text-lg">♀️</span> Winda Harmoni</td>
                                <td class="py-2">Hot Stone Massage</td>
                                <td class="py-2">29 Nov 2023</td>
                                <td class="py-2">2 Orang</td>
                                <td class="py-2">
                                    <span class="text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full text-[10px]">Selesai</span>
                                </td>
                                <td class="py-2 space-x-1">
                                    <button class="text-primary text-xs"><i class="fas fa-eye text-[#44BBA4]"></i></button>
                                    <button class="text-red-500 text-xs"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">L01170923</td>
                                <td class="py-2 flex items-center gap-1"><span class="text-pink-500 text-lg">♀️</span> Umi Sarimi</td>
                                <td class="py-2">Full Body Massage</td>
                                <td class="py-2">29 Nov 2023</td>
                                <td class="py-2">1 Orang</td>
                                <td class="py-2">
                                    <span class="text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full text-[10px]">Selesai</span>
                                </td>
                                <td class="py-2 space-x-1">
                                    <button class="text-primary text-xs"><i class="fas fa-eye text-[#44BBA4]"></i></button>
                                    <button class="text-red-500 text-xs"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                {{-- Pagination --}}
                <div class="flex justify-between items-center mt-4 text-[10px] text-gray-600">
                    <span>Halaman 1 dari 200</span>
                    <div class="flex space-x-1">
                        <button class="px-2 py-1 rounded bg-[#44BBA4] text-white">1</button>
                        <button class="px-2 py-1 rounded bg-gray-100">2</button>
                        <button class="px-2 py-1 rounded bg-gray-100">3</button>
                        <span class="px-1">...</span>
                        <button class="px-2 py-1 rounded bg-gray-100">200</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- JavaScript Tab Switch --}}
        <script>
            function switchTab(tab) {
                const tabs = ['transfer', 'cash'];
                tabs.forEach(t => {
                    document.getElementById('tab-' + t).classList.remove('text-emerald-500', 'border-b-2', 'border-emerald-500');
                    document.getElementById('tab-' + t).classList.add('text-gray-400');
                    document.getElementById('content-' + t).classList.add('hidden');
                });
                document.getElementById('tab-' + tab).classList.remove('text-gray-400');
                document.getElementById('tab-' + tab).classList.add('text-emerald-500', 'border-b-2', 'border-emerald-500');
                document.getElementById('content-' + tab).classList.remove('hidden');
            }
        </script>
    </div>
</div>
@endsection
