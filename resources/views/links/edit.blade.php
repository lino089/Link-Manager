@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-4">
    <!-- Tombol Kembali & Judul -->
    <div class="mb-6">
        <a href="{{ route('links.index') }}" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">
            &larr; Kembali ke Daftar Tautan
        </a>
        <h1 class="text-2xl font-bold text-gray-900 mt-2">Edit Tautan</h1>
        <p class="text-sm text-gray-500">Perbarui informasi tautan "{{ $link->title }}"</p>
    </div>

    <!-- Formulir Ubah -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <form action="{{ route('links.update', $link) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- 1. Judul Tautan -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Tautan <span class="text-red-500">*</span></label>
                <input 
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $link->title) }}",
                    required
                    @class([
                        "mt-1 block w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-1",
                        "border-red-500 focus:border-red-500 focus:ring-red-500" => $errors->has('title'),
                        "border-indigo-500 focus:border-indigo-500 focus:ring-indigo-500" => !$errors->has('title')
                    ])
                >
                @error('title')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- 2. Alamat URL -->
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">Alamat URL <span class="text-red-500">*</span></label>
                <input 
                    type="text"
                    name="url"
                    id="url"
                    value="{{ old('url', $link->url) }}",
                    required
                    @class([
                        "mt-1 block w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-1",
                        "border-red-500 focus:border-red-500 focus:ring-red-500" => $errors->has('url'),
                        "border-indigo-500 focus:border-indigo-500 focus:ring-indigo-500" => !$errors->has('url')
                    ])
                >
                @error('url')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- 3. Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">description <span class="text-red-500">*</span></label>
                <input 
                    type="text"
                    name="description"
                    id="description"
                    value="{{ old('description', $link->description) }}",
                    required
                    @class([
                        "mt-1 block w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-1",
                        "border-red-500 focus:border-red-500 focus:ring-red-500" => $errors->has('description'),
                        "border-indigo-500 focus:border-indigo-500 focus:ring-indigo-500" => !$errors->has('description')
                    ])
                >
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
                    {{ old('is_active', $link->is_active) ? 'checked' : ''}}
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">
                    Aktifkan tautan ini(tampil di halaman publik)
                </label>
            </div>
            
            <!-- Tombol Simpan Perubahan -->
            <div class="pt-3 flex items-center justify-end space-x-3 border-t border-gray-100">
                <a href="{{ route('links.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
                    Simpan Tautan
                </button>
            </div
        </form>
    </div>
</div>
@endsection