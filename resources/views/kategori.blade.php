<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mayung Media | {{ $namaKategori }}</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/author.webp') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@100..800&family=Playfair+Display:wght@400..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Anek Latin', sans-serif;
        }
        h1,h2 .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        .content-portal p:first-of-type::first-letter {
            float: left;
            font-size: 5rem;
            line-height: 0.85;
            font-weight: 900;
            padding-right: 16px;
            margin-top: 4px;
            font-family: 'Playfair Display', serif;
            color: white;
        }
    </style>
</head>

<body class="bg-secondary text-white antialiased min-h-screen">
    <header id="main-navbar" class="fixed top-0 left-0 w-full h-[80px] z-50 bg-[#111827]/80 backdrop-blur-md transition-all duration-300 border-b border-white/10">
    <nav class="max-w-7xl mx-auto h-full flex items-center justify-between px-6">
        <a href="#" class="z-50">
            <img src="{{ asset('img/logo_putih.webp') }}" alt="Logo Mayung Media" class="h-24 transition-transform hover:scale-105">
        </a>
        <div class="flex items-center">
            <ul id="nav-menu" class="hidden md:flex absolute md:static top-[80px] left-0 w-full bg-[#111827] md:bg-transparent py-8 md:py-0 space-y-6 md:space-y-0 md:space-x-10 text-2xl md:text-base font-semibold text-center transition-all duration-300">
                <li><a href="{{ route('portal.kategori', 'alam') }}" class="hover:text-blue-400 transition">Alam</a></li>
                <li><a href="{{ route('portal.kategori', 'budaya') }}" class="hover:text-blue-400 transition">Budaya</a></li>
                <li><a href="{{ route('portal.kategori', 'berdaya') }}" class="hover:text-blue-400 transition">Berdaya</a></li>
                <li><a href="{{ route('portal.kategori', 'suara') }}" class="hover:text-blue-400 transition">Suara</a></li>
            </ul>
            <button id="menu-button" class="hamburger hamburger--collapse md:hidden z-50" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </nav>
</header>
    <section class="px-12 md:px-32 py-12 min-h-screen text-white flex flex-col items-center mt-12">
        <div class="text-center mb-16">
            @php
                $colorMap = [
                    'ALAM' => 'text-alam',
                    'BERDAYA' => 'text-berdaya',
                    'BUDAYA' => 'text-budaya',
                    'SUARA' => 'text-suara',
                ];
                $kategoriColor = $colorMap[$namaKategori] ?? 'text-gray-500';
            @endphp

            <p class="text-lg font-semibold uppercase tracking-widest text-gray-400">Kategori</p>
            <h1 class="text-7xl font-bold uppercase {{ $kategoriColor }} tracking-widest">{{ $namaKategori }}</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 w-full justify-center">
            @foreach ($portals as $item)
                <a href="{{ route('portal.show', $item->slug) }}" class="block">
                    <div class="md:w-96 w-80 flex-shrink-0 bg-transparent flex flex-col gap-4">
                        <img src="{{ url('storage/' . $item->Gambar) }}" alt="{{ $item->Judul }}"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]">
                        <h2 class="font-bold text-xl line-clamp-2">{{ $item->Judul }}</h2>
                        <div class="flex gap-3 justify-start text-gray-500 text-sm">
                            <p>{{ $item->Penulis }} | {{ $item->created_at->format('d/m/y') }} <span
                                    class="mx-1">|</span> <i class="far fa-eye"></i> {{ $item->views ?? 0 }}</p>
                        </div>
                        <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($item->Konten), 50, '...') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
