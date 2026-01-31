<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\portalKontrol;

Route::get('/', [portalKontrol::class, 'index'])->name('index');
Route::get('/berita/{slug}', [portalKontrol::class, 'show'])->name('portal.show');
Route::get('/kategori/{slug}', [portalKontrol::class, 'kategori'])->name('portal.kategori');