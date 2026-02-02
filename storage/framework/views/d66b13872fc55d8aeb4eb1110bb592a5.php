<!DOCTYPE html>
<html class="scroll-smooth!" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mayung Media Clone</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/author.webp')); ?>">
    <link rel="stylesheet" href="hamburgers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@100..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Anek Latin', sans-serif;
        }
        h1,h2,.font-playfair {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<header id="main-navbar" class="fixed top-0 left-0 w-full h-[80px] z-50 bg-transparent transition-all duration-300 border-b border-transparent">
    
    <nav class="max-w-7xl mx-auto h-full flex items-center justify-between px-6">  
        
        <a href="<?php echo e(route('index')); ?>" class="z-50">
            <img src="<?php echo e(asset('img/logo_putih.webp')); ?>" alt="Logo Mayung Media" class="h-10 md:h-16 transition-transform hover:scale-105">
        </a>

        <div class="flex items-center">
            <ul id="nav-menu" class="hidden md:flex absolute md:static top-[80px] left-0 w-full bg-[#111827] md:bg-transparent py-8 md:py-0 space-y-6 md:space-y-0 md:space-x-10 text-2xl md:text-base font-semibold text-center text-white transition-all duration-300">
                <li><a href="<?php echo e(route('portal.kategori', 'alam')); ?>" class="hover:text-blue-400 transition">Alam</a></li>
                <li><a href="<?php echo e(route('portal.kategori', 'budaya')); ?>" class="hover:text-blue-400 transition">Budaya</a></li>
                <li><a href="<?php echo e(route('portal.kategori', 'berdaya')); ?>" class="hover:text-blue-400 transition">Berdaya</a></li>
                <li><a href="<?php echo e(route('portal.kategori', 'suara')); ?>" class="hover:text-blue-400 transition">Suara</a></li>
            </ul>

            <button id="menu-button" class="hamburger hamburger--collapse md:hidden z-50" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </nav>
</header>
<body class="bg-primary text-white scroll-smooth tracking-wide">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <section x-data="{
        activeSlide: 0,
        slides: <?php echo e($rekomendasi->count()); ?>,
        init() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides
            }, 5000)
        }
    }" class="relative w-full h-screen overflow-hidden bg-black">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $rekomendasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
           <?php
        $colorMap = [
            'ALAM' => 'bg-alam',
            'BERDAYA' => 'bg-berdaya',
            'BUDAYA' => 'bg-budaya',
            'SUARA' => 'bg-suara',
        ];
        $kategoriColor = $colorMap[$item->Kategori] ?? 'bg-gray-500';
        ?>
            <div x-show="activeSlide === <?php echo e($index); ?>" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute inset-0 w-full h-full">
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="relative block w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center bg-fixed"
                        style="background-image: url('<?php echo e(asset('storage/' . $item->Gambar)); ?>')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
                    <div class="relative h-full flex items-center justify-center">
                        <div class="px-4 text-center max-w-5xl mt-32">
                            <span
                                class="inline-block <?php echo e($kategoriColor); ?> py-3 px-4 rounded-lg text-2xl font-semibold tracking-widest mb-3 uppercase text-white">
                                <?php echo e($item->Kategori); ?>

                            </span>
                            <h1 class="text-4xl mx-auto font-bold md:text-7xl leading-tight text-white drop-shadow-lg">
                                <?php echo e($item->Judul); ?>

                            </h1>
                            <p class="text-md mt-6 md:text-2xl text-gray-300">
                                Oleh <?php echo e($item->Penulis); ?> • <?php echo e($item->created_at->format('d F Y')); ?>

                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="absolute right-3 md:right-10 top-1/2 -translate-y-1/2 z-20 flex flex-col gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $rekomendasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                   <button
  @click="activeSlide = <?php echo e($index); ?>" :class="activeSlide === <?php echo e($index); ?> ? 'bg-blue-400 h-10 w-2' : 'bg-white/10 h-2 w-2'" class="rounded-full transition-all duration-500 shadow-sm">
 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    </section>
    <section class="px-12 md:px-32 pt-12 pb-48 bg-primary">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-semibold">Terkini</h1>
            <div class="flex gap-4">
                <button onclick="scrollSlider(-400)"
                    class="h-[40px] w-[40px] border-[1px] border-gray-700 bg-transparent rounded-full hover:bg-gray-700 transition">
                    <i class="fas fa-angle-left"></i>
                </button>
                <button onclick="scrollSlider(400)"
                    class="h-[40px] w-[40px] border-[1px] border-gray-700 bg-transparent rounded-full hover:bg-gray-700 transition">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
        </div>
        <hr class="border-t border-white opacity-20 mt-6 w-auto my-12">
        <div id="slider" class="flex overflow-hidden gap-6 pb-6 scrollbar-hide snap-x snap-mandatory scrool-smooth">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php
                    $colorMap = [
                        'ALAM' => 'text-alam',
                        'BERDAYA' => 'text-berdaya',
                        'BUDAYA' => 'text-budaya',
                        'SUARA' => 'text-suara',
                    ];
                    $kategoriColor = $colorMap[$item->Kategori] ?? 'text-gray-500';
                ?>
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="block">
                    <div class="w-80 flex-shrink-0 bg-transparent flex flex-col gap-4 snap-center">
                        <img src="<?php echo e(url('storage/' . $item->Gambar)); ?>"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]" alt="<?php echo e($item->Judul); ?>">
                        <p class="<?php echo e($kategoriColor); ?> font-bold"><?php echo e($item->Kategori); ?></p>
                        <h2 class="font-bold text-xl line-clamp-2"><?php echo e($item->Judul); ?></h2>
                        <div class="flex gap-3 justify-start text-gray-500 text-sm">
                         <p><?php echo e($item->Penulis); ?> | <?php echo e($item->created_at->format('d/m/y')); ?> <span
                                    class="mx-1">|</span> <i class="far fa-eye"></i> <?php echo e($item->view ?? 0); ?></p>
                        </div>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        </div>
        </div>
        </div>
    </section>
    <section class="px-12 md:px-32 py-12 bg-secondary text-white">
        <div class="flex justify-between items-center mb-8">
            <h1 id="alam" class="text-4xl font-semibold">ALAM</h1>
            <a href="<?php echo e(route('portal.kategori', 'alam')); ?>">
                <p class="font-semibold text-lg uppercase">Lihat Semua</p>
            </a>
        </div>
        <hr class="border-t border-white opacity-20 my-12">
        <div class="flex flex-wrap gap-5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portals->where('Kategori', 'ALAM')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $thisColor = $colorMap[$item->Kategori] ?? 'text-gray-500'; ?>
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="block">
                    <div class="w-80 flex-shrink-0 bg-transparent flex flex-col gap-4">
                        <img src="<?php echo e(url('storage/' . $item->Gambar)); ?>" alt="<?php echo e($item->Judul); ?>"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]">
                        <p class="<?php echo e($thisColor); ?> font-bold"><?php echo e($item->Kategori); ?></p>
                        <h2 class="font-bold text-xl line-clamp-2"><?php echo e($item->Judul); ?></h2>
                        <div class="flex gap-3 justify-start text-gray-500 text-sm">
                            <p><?php echo e($item->Penulis); ?> | <?php echo e($item->created_at->format('d/m/y')); ?> <span
                                    class="mx-1">|</span> <i class="far fa-eye"></i> <?php echo e($item->views ?? 0); ?></p>
                        </div>
                        <p class="text-gray-400 text-sm"><?php echo e(Str::limit(strip_tags($item->Konten), 50, '...')); ?></p>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <div class="flex justify-between items-center mb-8 mt-16 gap-5">
            <h1 id="berdaya" class="text-4xl font-semibold">BERDAYA</h1>
            <a href="<?php echo e(route('portal.kategori', 'berdaya')); ?>">
                <p class="font-semibold text-lg uppercase">Lihat Semua</p>
            </a>
        </div>
        <hr class="border-t border-white opacity-20 my-12">

        <div class="flex flex-wrap gap-5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portals->where('Kategori', 'BERDAYA')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $thisColor = $colorMap[$item->Kategori] ?? 'text-gray-500'; ?>
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="block">
                    <div class="w-80 flex-shrink-0 bg-transparent flex flex-col gap-4">
                        <img src="<?php echo e(url('storage/' . $item->Gambar)); ?>" alt="<?php echo e($item->Judul); ?>"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]">
                        <p class="<?php echo e($thisColor); ?> font-bold"><?php echo e($item->Kategori); ?></p>
                        <h2 class="font-bold text-xl line-clamp-2"><?php echo e($item->Judul); ?></h2>
                        <div class="flex gap-3 justify-start text-gray-500 text-sm">
                            <p><?php echo e($item->Penulis); ?> | <?php echo e($item->created_at->format('d/m/y')); ?> <span
                                    class="mx-1">|</span> <i class="far fa-eye"></i> <?php echo e($item->views ?? 0); ?></p>
                        </div>
                        <p class="text-gray-400 text-sm"><?php echo e(Str::limit(strip_tags($item->Konten), 50, '...')); ?></p>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <div class="flex justify-between items-center mb-8 mt-16">
            <h1 id="budaya" class="text-4xl font-semibold">BUDAYA</h1>
            <a href="<?php echo e(route('portal.kategori', 'budaya')); ?>">
                <p class="font-semibold text-lg uppercase">Lihat Semua</p>
            </a>
        </div>
        <hr class="border-t border-white opacity-20 my-12">

        <div class="flex flex-wrap gap-5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portals->where('Kategori', 'BUDAYA')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $thisColor = $colorMap[$item->Kategori] ?? 'text-gray-500'; ?>
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="block">
                    <div class="w-80 flex-shrink-0 bg-transparent flex flex-col gap-4">
                        <img src="<?php echo e(url('storage/' . $item->Gambar)); ?>" alt="<?php echo e($item->Judul); ?>"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]">
                        <p class="<?php echo e($thisColor); ?> font-bold"><?php echo e($item->Kategori); ?></p>
                        <h2 class="font-bold text-xl line-clamp-2"><?php echo e($item->Judul); ?></h2>
                        <div class="flex gap-3 justify-start text-gray-500 text-sm">
                            <p><?php echo e($item->Penulis); ?> | <?php echo e($item->created_at->format('d/m/y')); ?> <span
                                    class="mx-1">|</span> <i class="far fa-eye"></i> <?php echo e($item->views ?? 0); ?></p>
                        </div>
                        <p class="text-gray-400 text-sm"><?php echo e(Str::limit(strip_tags($item->Konten), 50, '...')); ?></p>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <div class="flex justify-between items-center mb-8 mt-16">
            <h1 id="suara" class="text-4xl font-semibold">SUARA</h1>
            <a href="<?php echo e(route('portal.kategori', 'suara')); ?>">
                <p class="font-semibold text-lg uppercase">Lihat Semua</p>
            </a>
        </div>
        <hr class="border-t border-white opacity-20 my-12">

        <div class="flex flex-wrap gap-5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portals->where('Kategori', 'SUARA')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $thisColor = $colorMap[$item->Kategori] ?? 'text-gray-500'; ?>
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="block">
                    <div class="w-80 flex-shrink-0 bg-transparent flex flex-col gap-4">
                        <img src="<?php echo e(url('storage/' . $item->Gambar)); ?>" alt="<?php echo e($item->Judul); ?>"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]">
                        <p class="<?php echo e($thisColor); ?> font-bold"><?php echo e($item->Kategori); ?></p>
                        <h2 class="font-bold text-xl line-clamp-2"><?php echo e($item->Judul); ?></h2>
                        <div class="flex gap-3 justify-start text-gray-500 text-sm">
                            <p><?php echo e($item->Penulis); ?> | <?php echo e($item->created_at->format('d/m/y')); ?> <span
                                    class="mx-1">|</span> <i class="far fa-eye"></i> <?php echo e($item->views ?? 0); ?></p>
                        </div>
                        <p class="text-gray-400 text-sm"><?php echo e(Str::limit(strip_tags($item->Konten), 50, '...')); ?></p>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </section>
    <footer class="bg-primary text-white pt-20 pb-10 px-6 md:px-32">
        <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-10 md:gap-[80px] items-start max-w-7xl mx-auto">
            <div class="max-w-md">
                <img src="<?php echo e(asset('img/logo_putih.webp')); ?>" class="h-16 md:h-20" alt="Logo">
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
const menuButton = document.getElementById('menu-button');
const navMenu = document.getElementById('nav-menu');

menuButton.addEventListener('click', () => {
    navMenu.classList.toggle('hidden');
    menuButton.classList.toggle('is-active');
}); 
        window.addEventListener('scroll', function() {
    const navbar = document.getElementById('main-navbar');
    
    // Gunakan classList.toggle untuk kode yang lebih ringkas
    const isScrolled = window.scrollY > 50;
    
    navbar.classList.toggle('bg-[#14192A]', isScrolled);
    navbar.classList.toggle('backdrop-blur-md', isScrolled);
    navbar.classList.toggle('border-white/10', isScrolled);
    
    navbar.classList.toggle('bg-transparent', !isScrolled);
    navbar.classList.toggle('border-transparent', !isScrolled);
});
        function scrollSlider(distance) {
            const slider = document.getElementById('slider');
            slider.scrollBy({
                left: distance,
                behavior: 'smooth'
            });
        }
    </script>
<?php /**PATH C:\Users\contd\.vscode\cli\Laravel\Mayung-Media\resources\views/index.blade.php ENDPATH**/ ?>