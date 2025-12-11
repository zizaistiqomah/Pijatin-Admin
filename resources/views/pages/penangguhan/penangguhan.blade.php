@extends('layouts.app')
@section('navtitle', 'Data Penangguhan')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">Data Penangguhan</h1>

    <table class="w-full border border-gray-300 bg-white">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama User</th>
                <th class="border px-4 py-2">Alasan</th>
                <th class="border px-4 py-2">Mulai</th>
                <th class="border px-4 py-2">Selesai</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>

        <tbody>
            @php $no = 1; @endphp
            @foreach ($penangguhan as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $no++ }}</td>
                    <td class="border px-4 py-2">{{ $item->user->nama_lengkap ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $item->alasan }}</td>
                    <td class="border px-4 py-2">{{ $item->tanggal_mulai }}</td>
                    <td class="border px-4 py-2">{{ $item->tanggal_selesai ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
