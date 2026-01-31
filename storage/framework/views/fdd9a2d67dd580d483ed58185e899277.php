<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mayung Media | <?php echo e($namaKategori); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/author.webp')); ?>">
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
    <header id="main-navbar" class="fixed top-0 left-0 w-full h-[80px] z-50 bg-transparent transition-all duration-300">
        <nav class="max-w-7xl mx-auto h-full flex items-center justify-between px-6">
            <a href="<?php echo e(route('index')); ?>">
                <img src="<?php echo e(asset('img/logo_putih.webp')); ?>" class="h-10 md:h-16">
            </a>
            <ul class="hidden md:flex space-x-10 font-semibold">
                <li><a href="<?php echo e(route('portal.kategori', 'alam')); ?>" class="hover:text-blue-400 transition">Alam</a>
                </li>
                <li><a href="<?php echo e(route('portal.kategori', 'budaya')); ?>" class="hover:text-blue-400 transition">Budaya</a>
                </li>
                <li><a href="<?php echo e(route('portal.kategori', 'berdaya')); ?>"
                        class="hover:text-blue-400 transition">Berdaya</a></li>
                <li><a href="<?php echo e(route('portal.kategori', 'suara')); ?>" class="hover:text-blue-400 transition">Suara</a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="px-12 md:px-32 py-12 min-h-screen text-white flex flex-col items-center mt-12">
        <div class="text-center mb-16">
            <?php
                $colorMap = [
                    'ALAM' => 'text-alam',
                    'BERDAYA' => 'text-berdaya',
                    'BUDAYA' => 'text-budaya',
                    'SUARA' => 'text-suara',
                ];
                $kategoriColor = $colorMap[$namaKategori] ?? 'text-gray-500';
            ?>

            <p class="text-lg font-semibold uppercase tracking-widest text-gray-400">Kategori</p>
            <h1 class="text-7xl font-bold uppercase <?php echo e($kategoriColor); ?> tracking-widest"><?php echo e($namaKategori); ?></h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 w-full justify-center">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <a href="<?php echo e(route('portal.show', $item->slug)); ?>" class="block">
                    <div class="md:w-96 w-80 flex-shrink-0 bg-transparent flex flex-col gap-4">
                        <img src="<?php echo e(url('storage/' . $item->Gambar)); ?>" alt="<?php echo e($item->Judul); ?>"
                            class="w-full h-auto object-cover rounded-lg aspect-[16/9]">
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
<?php /**PATH C:\Users\contd\.vscode\cli\Laravel\Mayung-Media\resources\views/kategori.blade.php ENDPATH**/ ?>