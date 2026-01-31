<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('portals', function (Blueprint $table) {
        $table->id();
        $table->string('Judul');
        $table->string('slug')->unique();
        $table->string('Kategori');
        $table->text('Konten');
        $table->String('Quote');
        $table->string('Penulis');
        $table->string('Gambar')->nullable();
        $table->string('foto_penulis')->nullable()->after('Penulis');
        $table->unsignedInteger('views')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portals');
    }
};
