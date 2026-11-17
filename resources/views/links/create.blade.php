@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-4">
    <!-- Tombol kembali -->
    <div class="mb-6">
        <a href="{{ route('links.index') }}" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">
            &larr; Kembali ke Daftar Tautan
        </a>
        <h1 class="text-2xl font-bold text-gray-900 mt-2">Tambah Tautan Baru</h1>
        <p class="text-sm text-gray-500">Lengkapi formulir di bawah ini untuk menambahkan tautan ke halaman publik.</p>
    </div>
    
    <!-- Formulir Tambah -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <form action="{{ route('links.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- 1. Judul Tautan -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Tautan <span class="text-red-500">*</span></label>
                <input 
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required
                    placeholder="Contoh: Github Profil Saya"
                    @class([
                        "mt-1 block w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-1",
                        "border-red-500 focus:border-red-500 focus:ring-red-500" => $errors->has('url'),
                        "border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" => !$errors->has('url')
                    ])
                >
                @error('title')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 2. Alamat URL -->
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">Alamat URL Tujuan <span class="text-red-500">*</span></label>
                <input 
                    type="url" 
                    name="url" 
                    id="url"
                    value="{{ old('url') }}"
                    required
                    placeholder="https://github.com/username"
                    @class([
                        "mt-1 block w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-1",
                        "border-red-500 focus:border-red-500 focus:ring-red-500" => $errors->has('url'),
                        "border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" => !$errors->has('url')
                    ])
                >
                <p class="text-xs text-gray-400 mt-1">Harus diawali dengan http:// atau https://</p>
                @error('url')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 3. Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Singkat (Opsional)</label>
                <textarea 
                    name="description" 
                    id="description"
                    rows="3"
                    placeholder="Keterangan singkat tentang isi tautan..."
                    @class([
                        "mt-1 block w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-1",
                        "border-red-500 focus:border-red-500 focus:ring-red-500" => $errors->has('url'),
                        "border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" => !$errors->has('url')
                    ])
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 4. Status Aktif (Checkbox) -->
            <div class="flex items-center">
                <input 
                    type="checkbox"
                    name="is_active"
                    id="is_active"
                    value="1"
                    {{ old('is_active', true) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                >
                <label for="is_active" class="ml-2 block text-sm text-gray-300 focus:ring-indigo-500">
                    Aktifkan tautan ini (langsung tampil di halaman publik)
                </label>
            </div>

            <!-- Tombol simpan -->
            <div class="pt-3 flex items-center justify-end space-x-3 border-t border-gray-100">
                <a href="{{ route('links.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
                    Simpan Tautan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection