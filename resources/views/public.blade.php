@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <!-- 1. Header Profil / Bio Singkat -->
    <div class="text-center mb-8">
        <div class="w-24 h-24 bg-indigo-600 text-white text-3xl font-bold rounded-full flex items-center justify-center mx-auto shadow-md mb-4">
            LM
        </div>
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Koleksi Tautan Saya</h1>
        <p class="text-sm text-gray-500 mt-1">Temukan berbagai proyek, artikel, dan media sosial saya di bawah ini.</p>
    </div>

    <!-- 2. Daftar Kartu Tautan -->
    <div class="space-y-4">
        @forelse ($links as $link)
            <a href="{{ route('links.visit', $link) }}" 
                target="_blank"
                rel="noopener noreferrer"
                class="block p-4 bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-400 hover:scale-[1.01] transition duration-200 group">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                                {{ $link->title }}
                        </h2>
                        @if ($link->description)
                            <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                {{ $link->description }}
                            </p>
                        @endif
                    </div>
                    <!-- Ikon Panah Eksternal -->
                    <span class="text-gray-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition duration-200 ml-4 shrink-0">
                        &rarr;
                    </span>
                </div>
            </a>
        @empty
            <!-- 3. Tampilan Kosong(Empty State) -->
             <div class="text-center py-12 px-4 bg-white rounded-xl border border-dashed border-gray-300">
                <h3 class="text-base font-medium text-gray-700">Belum ada tautan aktif</h3>
                <p class="text-xs text-gray-500 mt-1 max-w-xs mx-auto">Saat ini belum ada tautan yang dipublikasikan. Silahkan tambahkan tautan baru melalui halaman manajemen.</p>
                <div class="mt-4">
                    <a href="{{ route('links.index') }}" class="inline-flex items-center text-xs font-semibold text-indigo-600 hover:text-indigo-800">
                        Buka Kelola Tautan &rarr;
                    </a>
                </div>
             </div>
        @endforelse
    </div>
</div>
@endsection