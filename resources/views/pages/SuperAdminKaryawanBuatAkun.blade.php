@extends('layouts.app')

@section('title', 'Buat Akun Karyawan')
@section('page-title', 'Buat Akun Karyawan')

@section('navtitle')   
    <div class="text-medium text-gray-600 mb-4">
        <a href="#" class="text-gray-800 hover:underline">Karyawan</a>
        <span class="mx-2">></span>
        <a href="#" class="text-emerald-600 hover:underline">Buat Akun</a>
    </div> 
@endsection

@section('content')
<div class="px-6 py-20">
    <!-- Back -->
    <div class="text-sm text-gray-600 mb-4">
        <a href="#" class="flex items-center hover:underline">
            <span class="text-2xl font-bold text-[#2A9D8F] mr-2">&larr;</span>
            <span class="text-sm font-medium text-gray-800">Karyawan</span>
        </a>
    </div>

    <!-- Page Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Akun Karyawan</h2>

    <!-- Form Card -->
    <div class="bg-white p-10 rounded-2xl shadow-md">
        <form>
            <div class="grid grid-cols-3 gap-6">
                <!-- Kolom 1 -->
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-semibold">Nama Depan*</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-2 py-2 mt-1 text-sm" placeholder="Masukkan nama depan">
                    </div>
                    <div>
                        <label class="text-sm font-semibold">Tempat Lahir</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan tempat lahir">
                    </div>
                    <div>
                        <label class="text-sm font-semibold">Jenis Kelamin*</label>
                        <div class="flex items-center space-x-6 mt-1">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" class="form-radio text-[#2A9D8F]">
                                <span class="ml-2 text-sm">Laki-Laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" class="form-radio text-[#2A9D8F]">
                                <span class="ml-2 text-sm">Perempuan</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold">Email</label>
                        <input type="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan alamat email">
                    </div>

                    <div>
                        <p class="text-base font-semibold mt-2">Area Penempatan</p>
                        <div class="mt-2">
                            <label class="text-sm font-semibold">Provinsi*</label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm">
                                        <option>Pilih Provinsi</option>
                                        <option value="Aceh">Aceh</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Papua Tengah">Papua Tengah</option>
                                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                                        <option value="Papua Selatan">Papua Selatan</option>
                                        <option value="Papua Barat Daya">Papua Barat Daya</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="text-sm font-semibold">Kota/Kabupaten*</label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm">
                                <option>Pilih Kota/Kabupaten</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-semibold">Nama Belakang*</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan nama belakang">
                    </div>
                    <div>
                        <label class="text-sm font-semibold">Tanggal Lahir</label>
                        <input type="date" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm">
                    </div>
                    <div>
                        <label class="text-sm font-semibold">Alamat</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan alamat lengkap">
                    </div>
                    <div>
                        <label class="text-sm font-semibold">No. Ponsel</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan nomor ponsel">
                    </div>
                </div>

                <!-- Kolom 3 -->
                <div class="space-y-4">
                        <div>
                            <label class="text-sm font-semibold block mb-1">Upload Foto</label>

                            <!-- Gambar profil di atas -->
                            <div class="flex justify-center mb-3">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Input file di bawah -->
                            <div class="flex items-center">
                                <input type="file" class="border border-gray-300 rounded-lg px-1 py-2 text-sm w-full">
                            </div>
                        </div>

                    <div>
                        <label class="text-sm font-semibold">Pilih Hak Akses Akun*</label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm">
                            <option>Pilih Role</option>
                            <option value="Aceh">Admin</option>
                            <option value="Aceh">Finance</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <p class="text-base font-semibold">Pembuatan Kata Sandi</p>
                        <div class="mt-2">
                            <label class="text-sm font-semibold">Kata Sandi*</label>
                            <input type="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan kata sandi">
                        </div>
                        <div class="mt-2">
                            <label class="text-sm font-semibold">Konfirmasi Kata Sandi*</label>
                            <input type="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-sm" placeholder="Masukkan kata sandi">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="mt-4 bg-[#2A9D8F] text-white px-5 py-2 rounded-lg text-sm shadow hover:bg-[#1E7B6E]">
                            Buat Akun
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
