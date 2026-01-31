<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $portal->Judul }}</title>
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

        h1,
        h2 .font-playfair {
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

<body class="bg-primary text-white antialiased min-h-screen">
    <header id="main-navbar" class="fixed top-0 left-0 w-full h-[80px] z-50 bg-[#111827]/80 backdrop-blur-md transition-all duration-300 border-b border-white/10">
    <nav class="max-w-7xl mx-auto h-full flex items-center justify-between px-6">
        <a href="#" class="z-50">
            <img src="{{ asset('img/logo_putih.webp') }}" alt="Logo Mayung Media" class="h-10 md:h-16 transition-transform hover:scale-105">
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
    @php
        $colorMap = [
            'ALAM' => 'bg-alam',
            'BERDAYA' => 'bg-berdaya',
            'BUDAYA' => 'bg-budaya',
            'SUARA' => 'bg-suara',
        ];
        $badgeColor = $colorMap[$portal->Kategori] ?? 'text-gray-500';
    @endphp
    <section class="relative w-full h-[65vh] md:h-[80vh] flex items-center justify-center overflow-hidden bg-primary">
        <div class="relative z-10 flex flex-col items-center px-6 text-center max-w-5xl">
            <span
                class="inline-block {{ $badgeColor }} py-2 px-6 rounded-lg text-sm font-bold uppercase tracking-widest mb-6 shadow-xl">
                {{ $portal->Kategori }}
            </span>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-10 drop-shadow-2xl">
                {{ $portal->Judul }}
            </h1>
            <div class="flex items-center gap-4 text-left mb-14 md:mb-0">
                <img src="{{ filled($portal->foto_penulis) && file_exists(public_path('storage/' . $portal->foto_penulis)) ? asset('storage/' . $portal->foto_penulis) : asset('img/author.webp') }}"onerror="this.onerror=null;this.src='{{ asset('img/logo_putih.webp') }}';"
                    class="w-12 h-12 rounded-full border-2 border-white/20" />
                <div class="flex flex-col leading-tight">
                    <p class="font-bold text-lg">{{ $portal->Penulis }}</p>
                    <p class="text-gray-400 text-sm">
                        {{ $portal->created_at->format('d F Y') }} <span class="mx-1">•</span> <i
                            class="far fa-eye"></i> {{ $portal->view ?? 0 }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <main class="relative z-10 bg-secondary pb-20">
        <section class="flex justify-center px-4">
            <div class="max-w-5xl mx-auto px-6 -mt-24 relative z-20">
                <div class="rounded-[24px] overflow-hidden shadow-2xl border border-white/5">
                    <img src="{{ asset('storage/' . $portal->Gambar) }}" class="w-full object-cover">
                </div>
            </div>
        </section>
        <section class="py-16 flex justify-center px-4">
            <div class="max-w-3xl w-full">
                <article class="prose prose-xl prose-invert leading-8 text-justify content-portal text-white">
                    {!! $portal->Konten !!}
                </article>
            </div>
        </section>
        <section
            class="flex items-start justify-center bg-primary gap-4 p-4 md:p-6 w-full max-w-lg md:max-w-xl mx-auto rounded-md border border-white/5">
            <div class="flex-shrink-0">
                <img src="{{ filled($portal->foto_penulis) && file_exists(public_path('storage/' . $portal->foto_penulis)) ? asset('storage/' . $portal->foto_penulis) : asset('img/author.webp') }}"onerror="this.onerror=null;this.src='{{ asset('img/logo_putih.webp') }}';"
                    class="w-16 h-16 rounded-full border-2 border-white/20 object-cover shadow-md flex-shrink-0" />
            </div>
            <div class="flex flex-col">
                <p class="text-xl font-bold text-white">{{ $portal->Penulis }}</p>
                <p class="italic text-gray-400 text-lg leading-relaxed">
                    "{{ $portal->Quote }}"
                </p>
            </div>
        </section>
        <div class="border-t items-center w-[90%] justify-center mx-auto mt-12 border-[#334155]"></div>
        <section class=" px-12 md:px-20 pt-12 pb-48">
            <h1 class="text-3xl font-semibold">Artikel Yang Mungkin Anda Suka</h1>
            <div class="border-t items-center w-[90%] justify-center mx-auto mt-6 border-[#334155] mb-16"></div>
            <div>
                <div class="flex flex-wrap justify-center gap-9 mt-12">
                    @foreach ($rekomendasi as $item)
                        @php
                            $colorMap = [
                                'ALAM' => 'text-alam',
                                'BERDAYA' => 'text-berdaya',
                                'BUDAYA' => 'text-budaya',
                                'SUARA' => 'text-suara',
                            ];

                            $kategoriColor = $colorMap[$item->Kategori] ?? 'text-gray-500';
                        @endphp

                        <a href="{{ route('portal.show', $item->slug) }}" class="block">
                            <div class="w-96 flex-shrink-0 flex flex-col gap-3 snap-center">
                                <img src="{{ asset('storage/' . $item->Gambar) }}"
                                    class="w-full aspect-[16/9] object-cover rounded-lg" alt="{{ $item->Judul }}">

                                <p class="{{ $kategoriColor }} font-bold">
                                    {{ $item->Kategori }}
                                </p>

                                <h2 class="font-bold text-xl line-clamp-2">
                                    {{ $item->Judul }}
                                </h2>

                                <p class="text-gray-500 text-sm">{{ $item->Penulis }}
                                    |{{ $item->created_at->format('d/m/y') }}</p>
                            </div>
                        </a>
                    @endforeach

                </div>

            </div>
        </section>
    </main>
    <footer class="bg-primary text-white pt-20 pb-10 px-6 md:px-32">
        <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-10 md:gap-[80px] items-start max-w-7xl mx-auto">
            <div class="max-w-md">
                <img src="{{ asset('img/logo_putih.webp') }}" class="h-16 md:h-20" alt="Logo">
                <p class="mt-8 text-gray-400 text-lg md:text-xl leading-relaxed">
                    Mayung Media adalah kanal berita di Nusa Tenggara Barat. Kami menyajikan informasi secara lebih
                    mendalam.
                </p>
            </div>
            <div class="flex flex-col md:flex-row gap-12 md:gap-20">
                <div>
                    <h4 class="text-xl md:text-2xl font-bold mb-6">Hubungi Kami</h4>
                    <a href="mailto:mayung.id@gmail.com" class="text-gray-400 text-lg hover:text-white transition">
                        mayung.id@gmail.com
                    </a>
                </div>
                <div>
                    <h4 class="text-xl md:text-2xl font-bold mb-6 ">Media Sosial</h4>
                    <div class="flex gap-6">
                        <a href="#"
                            class="text-white hover:text-blue-600 text-2xl transition transform hover:scale-110">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#"
                            class="text-white hover:text-blue-600 text-2xl transition transform hover:scale-110">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="text-white hover:text-blue-600 text-2xl transition transform hover:scale-110">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-t border-white/10 mt-20 mb-8">
        <p class="text-gray-500 text-sm text-center md:text-center">
            © 2026 Mayung Media Nusantara. All rights reserved.
        </p>
    </footer>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('main-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-primary/80', 'backdrop-blur-md', 'border-white/10');
            } else {
                navbar.classList.remove('bg-primary/80', 'backdrop-blur-md', 'border-white/10');
            }
        });
    </script>
</body>

</html>
