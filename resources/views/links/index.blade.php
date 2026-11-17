@extends('layaouts.app')

@section('title', 'Kelola Tautan')
    @section('content')
        <div class="space-y-6">
            <!-- Header & Tombol Tambah -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-2xl font-bold text-gray-900">
                    Kelola Tautan
                </h1>
                <p class="text-sm text-gray-500">Daftar semua tautan yang telah kamu buat beserta performa kliknya.</p>
            </div>
            <a href="{{ route('links.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium  rounded-lg shadow-sm transition">+ Tambah Tautan Baru</a>
        </div>

        <!-- Tabel Daftar Tautan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-xs uppercase font-semibold">
                            <th class="py-3.5 px-4">Judul & Keterangann</th>
                            <th class="py-3.5 px-4">URL Tujuan</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4">klik</th>
                            <th class="py-3.5 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($links as $link)
                            <tr class="hover:bd-gray-50 transition">
                                <td class="py-4 px-4">
                                    <div class="font-medium text-gray-900">{{ $liknk->title }}</div>
                                    @if ($link->description)
                                        <div class="text-xs text-gray-500 mt-0.5 line-clamp-1">{{ $link->description }}</div>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-gray-500">
                                    <a href="{{ $link->url }}" target="_blank" class="text-indigo-600 hover:underline max-w-xs truncate block">{{ $link->url }}</a>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    @if ($link->is_active)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Nonaktif</span>
                                </td>
                                <td class="py-4 px-4 text-center font-semibold text-gray-700">
                                    {{ number_format($link-clicks) }}
                                </td>
                                <td class="py-4 px-4 text-right space-x-2 whitespace-nowrap">
                                    <a href="{{ route('links.edit', $links) }}" class="text-indigo-600 hover:text-indigo-900 text-xs font-medium">Edit</a>
                                    <span class="text-gray-300">|</span>

                                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus tautan ini?');">
                                        @crsf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-grey-500 text-sm">
                                    Belum ada tautan yang dibut. Klik tombol diatas untuk menambah tautan pertamamu.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection