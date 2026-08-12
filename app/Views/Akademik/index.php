<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- Hero -->
<section class="relative h-[400px] overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/95 via-emerald-800/85 to-teal-900/90 z-10"></div>
    <div class="w-full h-full bg-gradient-to-br from-emerald-800 to-teal-900"></div>
    <div class="absolute inset-0 z-20 flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-4 font-medium">Akademik</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Informasi Akademik</h1>
            <p class="text-lg md:text-xl text-emerald-50 max-w-3xl mx-auto">
                Informasi lengkap mengenai kegiatan belajar mengajar, kalender akademik,
                dan program-program unggulan <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>.
            </p>
        </div>
    </div>
</section>

<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Kegiatan Belajar Mengajar -->
        <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="book-open" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Kegiatan Belajar Mengajar</h2>
            </div>
            <div class="space-y-4">
                <?php foreach ($kegiatanBelajar ?? [] as $item): ?>
                <div class="border border-gray-200 rounded-lg p-5">
                    <div class="flex flex-wrap items-center gap-4 mb-2">
                        <span class="font-semibold text-emerald-600"><?= esc($item['hari']) ?></span>
                        <span class="text-gray-400">•</span>
                        <span class="font-medium text-gray-900"><?= esc($item['waktu']) ?></span>
                    </div>
                    <p class="text-gray-600"><?= esc($item['kegiatan']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-6 bg-emerald-50 border border-emerald-200 rounded-lg p-4">
                <h3 class="font-semibold text-emerald-900 mb-2">Kurikulum yang Diterapkan:</h3>
                <ul class="space-y-1 text-emerald-800 text-sm">
                    <li>• Kurikulum Merdeka (Kemendikbud)</li>
                    <li>• Kurikulum Madrasah (Kemenag)</li>
                    <li>• Kurikulum Lokal (Tahfidz &amp; Bahasa Arab)</li>
                </ul>
            </div>
        </section>

        <!-- Kalender Akademik -->
        <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="calendar" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Kalender Akademik</h2>
            </div>

            <?php if (!empty($kalender)): ?>
            <?php
            // Kelompokkan per tahun ajaran
            $grouped = [];
            foreach ($kalender as $k) {
                $ta = $k['tahun_ajaran'] ?? 'Umum';
                $grouped[$ta][] = $k;
            }
            $kategoriKalenderColor = [
                'Libur'    => 'bg-red-100 text-red-700',
                'Ujian'    => 'bg-blue-100 text-blue-700',
                'Kegiatan' => 'bg-emerald-100 text-emerald-700',
                'SPMB'     => 'bg-amber-100 text-amber-700',
                'Lainnya'  => 'bg-gray-100 text-gray-700',
            ];
            ?>
            <?php foreach ($grouped as $tahunAjaran => $items): ?>
            <div class="mb-6">
                <h3 class="text-base font-semibold text-gray-700 mb-3">Tahun Ajaran <?= esc($tahunAjaran) ?></h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-emerald-50 border-b-2 border-emerald-200">
                                <th class="text-left py-3 px-4 text-gray-700 font-semibold">Kegiatan</th>
                                <th class="text-left py-3 px-4 text-gray-700 font-semibold">Tanggal Mulai</th>
                                <th class="text-left py-3 px-4 text-gray-700 font-semibold hidden md:table-cell">Tanggal Selesai</th>
                                <th class="text-left py-3 px-4 text-gray-700 font-semibold hidden sm:table-cell">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $k): ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-4 text-gray-900 font-medium"><?= esc($k['kegiatan']) ?></td>
                                <td class="py-3 px-4 text-gray-600">
                                    <?php
                                    $locales = ['January'=>'Januari','February'=>'Februari','March'=>'Maret','April'=>'April','May'=>'Mei','June'=>'Juni','July'=>'Juli','August'=>'Agustus','September'=>'September','October'=>'Oktober','November'=>'November','December'=>'Desember'];
                                    $tgl = date('d F Y', strtotime($k['tanggal_mulai']));
                                    echo esc(strtr($tgl, $locales));
                                    ?>
                                </td>
                                <td class="py-3 px-4 text-gray-600 hidden md:table-cell">
                                    <?php if (!empty($k['tanggal_selesai'])): ?>
                                        <?= esc(strtr(date('d F Y', strtotime($k['tanggal_selesai'])), $locales)) ?>
                                    <?php else: ?>
                                        <span class="text-gray-400">—</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4 hidden sm:table-cell">
                                    <?php $badgeK = $kategoriKalenderColor[$k['kategori']] ?? 'bg-gray-100 text-gray-700'; ?>
                                    <span class="inline-block px-2 py-1 <?= $badgeK ?> rounded-full text-xs font-medium"><?= esc($k['kategori']) ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="text-gray-400 italic text-center py-8">Kalender akademik belum tersedia.</p>
            <?php endif; ?>
        </section>

        <!-- Program Unggulan -->
        <section class="bg-white rounded-xl shadow-sm p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="target" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Program Unggulan Madrasah</h2>
            </div>
            <?php if (!empty($program)): ?>
            <div class="space-y-4">
                <?php foreach ($program as $p): ?>
                <div class="border border-gray-200 rounded-lg p-5 hover:border-emerald-200 hover:bg-emerald-50/30 transition-colors">
                    <div class="flex flex-wrap items-center gap-3 mb-2">
                        <h3 class="text-gray-900 font-semibold"><?= esc($p['nama']) ?></h3>
                        <span class="text-xs bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full">
                            <?= esc($p['tingkat']) ?>
                        </span>
                    </div>
                    <p class="text-gray-600"><?= esc($p['deskripsi']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="text-gray-400 italic text-center py-8">Program belum tersedia.</p>
            <?php endif; ?>

            <!-- Prestasi Statistik -->
            <div class="mt-8 bg-gradient-to-r from-emerald-50 to-blue-50 border border-emerald-200 rounded-lg p-6">
                <h3 class="font-semibold text-gray-900 mb-3">Prestasi Akademik &amp; Non-Akademik</h3>
                <div class="grid md:grid-cols-3 gap-4 text-sm">
                    <div class="bg-white rounded-lg p-4">
                        <p class="text-2xl font-bold text-emerald-600 mb-1">15+</p>
                        <p class="text-gray-600">Juara Lomba Tingkat Provinsi</p>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <p class="text-2xl font-bold text-emerald-600 mb-1">95%</p>
                        <p class="text-gray-600">Lulusan Diterima di SMP Favorit</p>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <p class="text-2xl font-bold text-emerald-600 mb-1"><?= esc($settings['akreditasi'] ?? 'A') ?></p>
                        <p class="text-gray-600">Akreditasi Madrasah</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<?= $this->endSection() ?>