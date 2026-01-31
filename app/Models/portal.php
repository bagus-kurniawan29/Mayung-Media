<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    protected $fillable = [
        'Judul',
        'slug',
        'Kategori',
        'Konten',
        'Penulis',
        'Gambar',
        'foto_penulis',
        'Quote',
        'views',
    ];
}
