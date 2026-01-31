<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use Illuminate\Http\Request;

class portalKontrol extends Controller
{
   public function index()
{
    $portals = Portal::all();
    $rekomendasi = Portal::latest()->take(3)->get();
    return view('index', compact('portals', 'rekomendasi'));
}

    public function show($slug)
    {
        // Cari berdasarkan slug, jika tidak ada tampilkan 404
        $portal = Portal::where('slug', $slug)->firstOrFail();
        $portal->increment('views');
        $rekomendasi = Portal::where('id', '!=', $portal->id)
            ->latest()
            ->limit(3)
            ->get();
        return view('berita', compact('portal','rekomendasi'));
    }
    public function kategori($slug)
{
    $namaKategori = strtoupper($slug);
    $portals = Portal::where('Kategori', $namaKategori)->latest()->get();
    if ($portals->isEmpty()) {
    }

return view('kategori', compact('portals', 'namaKategori'));
}

}