<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc($meta_desc ?? $settings['meta_desc'] ?? 'Madrasahku - Sekolah Islam Terbaik di Pekalongan') ?>">
    <title><?= esc($page_title ?? 'Beranda') ?> | <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/logo/' . ($settings['favicon'] ?? 'favicon.ico')) ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        arabic: ['Amiri', 'serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5', 100: '#d1fae5', 200: '#a7f3d0',
                            300: '#6ee7b7', 400: '#34d399', 500: '#10b981',
                            600: '#059669', 700: '#047857', 800: '#065f46', 900: '#064e3b',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/theme.css') ?>">

    <!-- Lucide Icons via CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
</head>
<body class="font-sans bg-white text-gray-900 antialiased">

    <!-- ========================
     HEADER / NAVBAR
========================= -->
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 font-sans">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">

            <!-- Logo -->
            <a href="<?= base_url('/') ?>" class="flex items-center gap-3 group">
                <?php if (!empty($settings['logo']) && file_exists(FCPATH . 'assets/images/logo/' . $settings['logo'])): ?>
                    <img src="<?= base_url('assets/images/logo/' . esc($settings['logo'])) ?>"
                         alt="<?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>"
                         class="h-10 md:h-12 w-auto">
                <?php else: ?>
                    <div class="bg-gradient-to-br from-emerald-600 to-teal-700 w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                        <span class="text-white font-bold text-lg md:text-xl">M</span>
                    </div>
                <?php endif; ?>
                <div>
                    <p class="font-bold text-gray-900 text-base md:text-lg leading-tight tracking-tight">
                        <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>
                    </p>
                    <p class="text-xs text-emerald-600 font-medium hidden sm:block tracking-wide">
                        <?= esc($settings['kota'] ?? 'Pekalongan') ?>
                    </p>
                </div>
            </a>

            <?php
            // Normalisasi path sekali saja, dipakai bareng oleh desktop & mobile nav
            $currentUri  = service('request')->getUri()->getPath();
            $currentPath = trim($currentUri, '/'); // '' untuk home, 'profil', 'akademik', dst
            helper('url'); // Pastikan helper url sudah dimuat untuk base_url()
            $navItems = [
                ['url' => '/',           'label' => 'Beranda'],
                ['url' => '/profil',     'label' => 'Profil'],
                ['url' => '/akademik',   'label' => 'Akademik'],
                ['url' => '/pengumuman', 'label' => 'Pengumuman'],
                ['url' => '/kontak',     'label' => 'Kontak'],
            ];

            // Helper cek aktif: exact match setelah normalisasi, tidak ada lagi OR yang rapuh
            $isNavActive = function (string $url): bool {
                $path = trim($url, '/'); // '' untuk beranda, 'profil', 'akademik', dst
                return $path === '' ? url_is('/') : url_is($path);
            };
            ?>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-1">
                <?php foreach ($navItems as $item):
                    $isActive = $isNavActive($item['url']);
                ?>
                    <a href="<?= base_url($item['url']) ?>"
                    class="px-4 py-2 rounded-lg text-sm font-medium tracking-wide transition-colors duration-200 <?= $isActive
                            ? 'bg-emerald-600 text-white font-semibold shadow-sm'
                            : 'text-gray-600 hover:text-emerald-700 hover:bg-emerald-50' ?>">
                        <?= esc($item['label']) ?>
                    </a>
                <?php endforeach; ?>

                <a href="<?= base_url('/spmbm') ?>"
                   class="ml-2 inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold tracking-wide hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg hover:scale-105 transition-all duration-200">
                    <span>Daftar Sekarang</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuBtn" class="md:hidden p-2 rounded-lg text-gray-600 hover:text-emerald-700 hover:bg-emerald-50 transition-colors" aria-label="Menu">
                <i data-lucide="menu" class="w-6 h-6" id="menuIcon"></i>
                <i data-lucide="x" class="w-6 h-6 hidden" id="closeIcon"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobileMenu" class="hidden md:hidden border-t border-gray-100 bg-white">
        <nav class="container mx-auto px-4 py-4 flex flex-col gap-1">
            <?php foreach ($navItems as $item):
                $isActive = $isNavActive($item['url']);
            ?>
                <a href="<?= base_url($item['url']) ?>"
                   class="px-4 py-3 rounded-lg text-sm font-medium tracking-wide border-l-4 transition-colors duration-200 <?= $isActive
                        ? 'bg-emerald-50 text-emerald-700 font-semibold border-emerald-600'
                        : 'text-gray-700 border-transparent hover:bg-gray-50 hover:text-emerald-700' ?>">
                    <?= esc($item['label']) ?>
                </a>
            <?php endforeach; ?>
            <a href="<?= base_url('/spmbm') ?>"
               class="mt-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-3 rounded-xl text-sm font-semibold text-center tracking-wide hover:from-emerald-700 hover:to-teal-700 transition-all">
                Daftar Sekarang
            </a>
        </nav>
    </div>
</header>

    <!-- ========================
         MAIN CONTENT
    ========================= -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- ========================
         FOOTER
    ========================= -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-16">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

                <!-- Kolom 1: Identitas -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="bg-gradient-to-br from-emerald-500 to-teal-600 w-11 h-11 rounded-xl flex items-center justify-center shadow">
                            <span class="text-white font-bold text-xl">M</span>
                        </div>
                        <div>
                            <p class="font-bold text-lg"><?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?></p>
                            <p class="text-emerald-400 text-xs"><?= esc($settings['kota'] ?? 'Pekalongan') ?></p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-5">
                        <?= esc($settings['tagline'] ?? 'Membentuk Generasi Berilmu, Berakhlak, dan Berprestasi') ?>
                    </p>
                    <!-- Sosmed -->
                    <div class="flex gap-3">
                        <?php if (!empty($settings['facebook_url'])): ?>
                        <a href="<?= esc($settings['facebook_url']) ?>" target="_blank" rel="noopener"
                           class="w-9 h-9 bg-gray-800 hover:bg-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="facebook" class="w-4 h-4"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['instagram_url'])): ?>
                        <a href="<?= esc($settings['instagram_url']) ?>" target="_blank" rel="noopener"
                           class="w-9 h-9 bg-gray-800 hover:bg-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['youtube_url'])): ?>
                        <a href="<?= esc($settings['youtube_url']) ?>" target="_blank" rel="noopener"
                           class="w-9 h-9 bg-gray-800 hover:bg-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="youtube" class="w-4 h-4"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['whatsapp'])): ?>
                        <a href="https://wa.me/62<?= ltrim(preg_replace('/[^0-9]/', '', $settings['whatsapp']), '0') ?>"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 bg-gray-800 hover:bg-green-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi -->
                <div>
                    <h4 class="font-semibold text-white mb-5 text-sm uppercase tracking-wider">Menu</h4>
                    <ul class="space-y-3">
                        <?php foreach ([['/', 'Beranda'], ['/profil', 'Profil Madrasah'], ['/akademik', 'Akademik'], ['/pengumuman', 'Pengumuman'], ['/spmbm', 'SPMBM'], ['/kontak', 'Kontak']] as [$url, $label]): ?>
                        <li>
                            <a href="<?= base_url($url) ?>" class="text-gray-400 hover:text-emerald-400 text-sm transition-colors flex items-center gap-2">
                                <i data-lucide="chevron-right" class="w-3 h-3"></i>
                                <?= $label ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div>
                    <h4 class="font-semibold text-white mb-5 text-sm uppercase tracking-wider">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-gray-400 text-sm">
                            <i data-lucide="map-pin" class="w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5"></i>
                            <span class="leading-relaxed"><?= esc($settings['alamat'] ?? '-') ?></span>
                        </li>
                        <li class="flex items-center gap-3 text-gray-400 text-sm">
                            <i data-lucide="phone" class="w-4 h-4 text-emerald-400 flex-shrink-0"></i>
                            <span><?= esc($settings['telepon'] ?? '-') ?></span>
                        </li>
                        <li class="flex items-center gap-3 text-gray-400 text-sm">
                            <i data-lucide="mail" class="w-4 h-4 text-emerald-400 flex-shrink-0"></i>
                            <span><?= esc($settings['email'] ?? '-') ?></span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-400 text-sm">
                            <i data-lucide="clock" class="w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5"></i>
                            <span><?= esc($settings['jam_operasional'] ?? '-') ?></span>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 4: SPMBM CTA -->
                <div>
                    <h4 class="font-semibold text-white mb-5 text-sm uppercase tracking-wider">Penerimaan Siswa</h4>
                    <div class="bg-gradient-to-br from-emerald-700 to-teal-800 rounded-2xl p-6 border border-emerald-600/30">
                        <div class="text-2xl mb-2">🎓</div>
                        <p class="font-semibold text-white mb-2">SPMBM 2026/2027</p>
                        <p class="text-emerald-100 text-xs mb-4 leading-relaxed">Daftarkan putra-putri Anda sekarang. Kuota terbatas!</p>
                        <a href="<?= base_url('/spmbm') ?>"
                           class="block text-center bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                            Info Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-5">
                <div class="flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-gray-500">
                    <p>&copy; <?= date('Y') ?> <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>. Hak cipta dilindungi.</p>
                    <p>Dikelola oleh Tim IT <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Lucide Init -->
    <script>
        lucide.createIcons();
    </script>

    <!-- Mobile Menu Script -->
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>

      <!-- Koreksi active-state navbar: pastikan hanya link dengan path PERSIS SAMA yang dapat class 'active' -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
    document.querySelectorAll('nav a').forEach(function (link) {
        const linkPath = new URL(link.href, window.location.origin).pathname.replace(/\/+$/, '') || '/';
        if (linkPath === currentPath) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});
</script>
</body>
</html>