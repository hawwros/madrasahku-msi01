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
         MAIN CONTENT
    ========================= -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- ========================
         FOOTER
    ========================= -->
    <footer class="bg-gray-900 text-white">
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