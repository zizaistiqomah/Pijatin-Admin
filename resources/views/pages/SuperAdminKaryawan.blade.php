@extends('layouts.app')

@section('title', 'Data Akun Karyawan')
@section('page-title', 'Data Akun Karyawan')
@section('page-description', 'Kelola data akun berdasarkan role')
@section('navtitle', 'Karyawan')

@section('content')
<div class="px-6 py-20">
    <!-- Header Judul -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Akun Karyawan</h2>
        <button class="bg-[#369af7] hover:bg-[#1f3573] text-white px-4 py-2 text-sm rounded-lg shadow">
            + Buat Akun
        </button>
    </div>

    {{-- Tab Header (Admin & Finance) --}}
    <div class="flex space-x-3 mb-4">
        <button id="tab-admin-btn" class="relative -mb-1 tab-button active-tab">
            <div class="bg-white border border-gray-300 rounded-t-lg px-6 py-2 shadow-md z-10 relative text-sm font-semibold">
                Admin
            </div>
            <div class="h-1 bg-white absolute bottom-0 left-0 right-0 z-20"></div>
        </button>
        <button id="tab-finance-btn" class="relative -mb-1 tab-button">
            <div class="bg-gray-100 border border-gray-300 rounded-t-lg px-6 py-2 shadow-sm z-0 text-sm text-gray-500">
                Finance
            </div>
        </button>
    </div>

    {{-- Card Container --}}
    <div class="bg-white rounded-2xl shadow-lg p-6">

        {{-- Top Bar --}}
        <form method="GET" class="flex justify-between items-center mb-6">
            <div class="w-1/3">
                <input type="text" name="search" placeholder="Cari nama atau ID..."
                    class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="bg-[#369af7] hover:bg-[#1f3573] text-white px-4 py-2 text-sm rounded-lg shadow">
                Filter
            </button>
        </form>

        {{-- Tab Contents (dummy data) --}}
        <div id="tab-admin" class="tab-content">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-600 bg-gray-100">
                    <tr>
                        <th class="py-3 px-4">Nomor ID</th>
                        <th class="py-3 px-4">Nama Lengkap</th>
                        <th class="py-3 px-4">Tanggal Bergabung</th>
                        <th class="py-3 px-4">Ponsel</th>
                        <th class="py-3 px-4">Jenis Kelamin</th>
                        <th class="py-3 px-4">Area Penempatan</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="border-b">
                        <td class="py-3 px-4">ADM001</td>
                        <td class="py-3 px-4">Nabila Usamah</td>
                        <td class="py-3 px-4">12 Jan 2024</td>
                        <td class="py-3 px-4">0812-3456-7890</td>
                        <td class="py-3 px-4">Perempuan</td>
                        <td class="py-3 px-4">Jakarta Barat</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-3">
                                <button class="text-blue-600 hover:underline text-sm">Lihat</button>
                                <button class="text-red-600 hover:underline text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 px-4">ADM002</td>
                        <td class="py-3 px-4">Dimas Saputra</td>
                        <td class="py-3 px-4">18 Feb 2024</td>
                        <td class="py-3 px-4">0896-7788-1234</td>
                        <td class="py-3 px-4">Laki-laki</td>
                        <td class="py-3 px-4">Bandung</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-3">
                                <button class="text-blue-600 hover:underline text-sm">Lihat</button>
                                <button class="text-red-600 hover:underline text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="tab-finance" class="tab-content hidden">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-600 bg-gray-100">
                    <tr>
                        <th class="py-3 px-4">Nomor ID</th>
                        <th class="py-3 px-4">Nama Lengkap</th>
                        <th class="py-3 px-4">Tanggal Bergabung</th>
                        <th class="py-3 px-4">Ponsel</th>
                        <th class="py-3 px-4">Jenis Kelamin</th>
                        <th class="py-3 px-4">Area Penempatan</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="border-b">
                        <td class="py-3 px-4">FIN001</td>
                        <td class="py-3 px-4">Jennie Rubby Jane</td>
                        <td class="py-3 px-4">20 Mar 2024</td>
                        <td class="py-3 px-4">0813-2222-4444</td>
                        <td class="py-3 px-4">Perempuan</td>
                        <td class="py-3 px-4">Tangerang</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-3">
                                <button class="text-blue-600 hover:underline text-sm">Lihat</button>
                                <button class="text-red-600 hover:underline text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 px-4">FIN002</td>
                        <td class="py-3 px-4">Agus Pratama</td>
                        <td class="py-3 px-4">25 Apr 2024</td>
                        <td class="py-3 px-4">0821-3333-7777</td>
                        <td class="py-3 px-4">Laki-laki</td>
                        <td class="py-3 px-4">Bekasi</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-3">
                                <button class="text-blue-600 hover:underline text-sm">Lihat</button>
                                <button class="text-red-600 hover:underline text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Script Tab Switching --}}
<script>
    const adminBtn = document.getElementById('tab-admin-btn');
    const financeBtn = document.getElementById('tab-finance-btn');
    const adminTab = document.getElementById('tab-admin');
    const financeTab = document.getElementById('tab-finance');

    const buttons = [adminBtn, financeBtn];

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => {
                b.classList.remove('active-tab');
                b.children[0].classList.remove('bg-white', 'text-gray-800', 'shadow-md');
                b.children[0].classList.add('bg-gray-100', 'text-gray-500', 'shadow-sm');
            });

            btn.classList.add('active-tab');
            btn.children[0].classList.remove('bg-gray-100', 'text-gray-500', 'shadow-sm');
            btn.children[0].classList.add('bg-white', 'text-gray-800', 'shadow-md');

            if (btn === adminBtn) {
                adminTab.classList.remove('hidden');
                financeTab.classList.add('hidden');
            } else {
                financeTab.classList.remove('hidden');
                adminTab.classList.add('hidden');
            }
        });
    });
</script>
@endsection
