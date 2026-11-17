<?php

namespace App\Http\Controllers;

use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use App\Models\Link;
use ReflectionUnionType;

class LinkController extends Controller
{
    // 1. Menampilkan Halaman depan Publik (Hanya Tautan Aktif)
    public function publicPage()
    {
        $links = Link::where('is_active', true)->latest()->get();

        return view('public', compact('links'));
    }

    // 2. Menampilkan Tabel Manajemen Tautan (Semua Tautan)
    public function index()
    {
        $links = Link::latest()->get();

        return view('links.index', compact('links'));
    }

    // 3. Menampilkan Formulir Tambah Tautan Baru
    public function create()
    {
        return view('links.create');
    }

    // 4. Memproses Penyimpanan Tautan Baru ke Database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string'
        ]);

        // Tangani nilai boolean dari checkbox is_active
        $validated['is_active'] = $request->boolean('is_active');

        // Simpan data ke database melalui Model Link
        Link::create($validated);

        // Alihkan kembali ke halaman daftar tautan dengan pesan sukses
        return redirect()->route('links.index')->with('success', 'Tautan baru berhasil ditambahkan!');
    }

    // 5. Menampilkan Detail Tautan (Opsional)
    public function show(Link $link)
    {
        return redirect()->route('links.edit', $link);
    }

    // 6. Menampilkan Formulir Edit Tautan
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    // 7. Memproses Pembaruan Data Tautan di Database
    public function update(Request $request, Link $link){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string'
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Simpan perubahan ke database
        $link->update($validated);

        return redirect()->route('links.index')->with('success', 'Tautan baru berhasil diperbarui!');
    }

    // 8. Menghapus Tautan dari Database
    public function destroy(Link $link){
        // Hapus rekaman data
        $link->delete();

        // Alihkan dengan pesan sukses
        return redirect()->route('links.index')->with('success', 'Tautan Berhasil dihapus!!');
    }

    // 9. Melacak klik tautan dan mengalihkan pengunjung ke URL tujuan.
    public function visit(Link $link)
    {
        // 1. Keamanan: Jika tautan berstatus nonaktif, tolak dengann 404
        if(!$link->is_active){
            abort(404, 'Tautan ini sedang tidak aktif.');
        }

        // 2. Menaikan Jumlah klik sebesar 1 di database.
        $link->increment('clicks');

        // 3. Alihkan pengunjung ke URL eklsternal
        return redirect()->away($link->url);
    }
}
