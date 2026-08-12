<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<?php
$kategoriColors = [
    'Akademik'        => 'bg-blue-100 text-blue-700',
    'SPMB'            => 'bg-emerald-100 text-emerald-700',
    'Keagamaan'       => 'bg-purple-100 text-purple-700',
    'Keuangan'        => 'bg-orange-100 text-orange-700',
    'Ekstrakurikuler' => 'bg-pink-100 text-pink-700',
    'Beasiswa'        => 'bg-yellow-100 text-yellow-700',
    'Teknologi'       => 'bg-gray-100 text-gray-700',
    'Umum'            => 'bg-slate-100 text-slate-700',
];

function formatTanggalId(string $datetime): string {
    $bulan = ['January'=>'Januari','February'=>'Februari','March'=>'Maret','April'=>'April','May'=>'Mei','June'=>'Juni','July'=>'Juli','August'=>'Agustus','September'=>'September','October'=>'Oktober','November'=>'November','December'=>'Desember'];
    return strtr(date('d F Y', strtotime($datetime)), $bulan);
}
?>

<!-- Hero -->
<section class="relative h-[400px] overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/95 via-emerald-800/85 to-teal-900/90 z-10"></div>
    <div class="w-full h-full bg-gradient-to-br from-emerald-800 to-teal-900"></div>
    <div class="absolute inset-0 z-20 flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-4 font-medium">Pengumuman</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Pengumuman</h1>
            <p class="text-lg md:text-xl text-emerald-50 max-w-3xl mx-auto">
                Informasi dan pengumuman resmi dari <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>
                untuk seluruh siswa, orang tua, dan stakeholder pendidikan.
            </p>
        </div>
    </div>
</section>

<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Pengumuman Penting -->
        <?php if (!empty($pengumumanPenting)): ?>
        <section class="mb-8">
            <div class="flex items-center gap-2 mb-4">
                <i data-lucide="pin" class="w-5 h-5 text-red-600"></i>
                <h2 class="text-xl font-bold text-gray-900">Pengumuman Penting</h2>
            </div>
            <div class="space-y-4">
                <?php foreach ($pengumumanPenting as $item): ?>
                <div class="bg-white border-l-4 border-red-500 rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-wrap items-center gap-3 mb-3">
                        <?php $badgeColor = $kategoriColors[$item['kategori']] ?? 'bg-gray-100 text-gray-700'; ?>
                        <span class="text-xs px-3 py-1 rounded-full font-medium <?= $badgeColor ?>">
                            <?= esc($item['kategori']) ?>
                        </span>
                        <div class="flex items-center gap-1 text-sm text-gray-500">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            <span><?= formatTanggalId($item['created_at']) ?></span>
                        </div>
                        <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-full font-medium">
                            ⚠ Penting
                        </span>
                    </div>
                    <h3 class="text-gray-900 font-semibold mb-2 text-lg"><?= esc($item['judul']) ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?= esc($item['konten']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- Pengumuman Lainnya -->
        <section>
            <div class="flex items-center gap-2 mb-4">
                <i data-lucide="bell" class="w-5 h-5 text-emerald-600"></i>
                <h2 class="text-xl font-bold text-gray-900">Pengumuman Lainnya</h2>
            </div>

            <?php if (!empty($pengumumanLainnya)): ?>
            <div class="space-y-4">
                <?php foreach ($pengumumanLainnya as $item): ?>
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-wrap items-center gap-3 mb-3">
                        <?php $badgeColor = $kategoriColors[$item['kategori']] ?? 'bg-gray-100 text-gray-700'; ?>
                        <span class="text-xs px-3 py-1 rounded-full font-medium <?= $badgeColor ?>">
                            <?= esc($item['kategori']) ?>
                        </span>
                        <div class="flex items-center gap-1 text-sm text-gray-500">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            <span><?= formatTanggalId($item['created_at']) ?></span>
                        </div>
                    </div>
                    <h3 class="text-gray-900 font-semibold mb-2 text-lg"><?= esc($item['judul']) ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?= esc($item['konten']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="bg-white rounded-lg p-12 text-center text-gray-400">
                <i data-lucide="bell-off" class="w-12 h-12 mx-auto mb-3 opacity-50"></i>
                <p>Belum ada pengumuman lainnya.</p>
            </div>
            <?php endif; ?>
        </section>

        <!-- Info Box -->
        <div class="mt-8 bg-emerald-50 border border-emerald-200 rounded-lg p-6">
            <div class="flex items-start gap-3">
                <i data-lucide="bell" class="w-5 h-5 text-emerald-600 mt-1 flex-shrink-0"></i>
                <div>
                    <h3 class="font-semibold text-emerald-900 mb-2">Tetap Update!</h3>
                    <p class="text-emerald-800 text-sm">
                        Pastikan Anda selalu memeriksa halaman pengumuman ini secara berkala untuk mendapatkan
                        informasi terbaru dari madrasah. Untuk informasi lebih lanjut, hubungi bagian humas
                        atau kunjungi kantor madrasah.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>