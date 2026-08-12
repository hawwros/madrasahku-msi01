<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- Hero -->
<section class="relative h-[400px] overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/95 via-emerald-800/85 to-teal-900/90 z-10"></div>
    <div class="w-full h-full bg-gradient-to-br from-emerald-800 to-teal-900"></div>
    <div class="absolute inset-0 z-20 flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-4 font-medium">SPMBM</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">
                <?= esc($spmbm['title'] ?? 'Sistem Penerimaan Murid Baru Madrasah') ?>
            </h1>
            <p class="text-lg md:text-xl text-emerald-50 max-w-3xl mx-auto mb-8">
                <?= esc($spmbm['subtitle'] ?? 'Daftarkan putra-putri Anda di ' . ($settings['nama_madrasah'] ?? 'Madrasahku') . ' — kuota terbatas, tahun pelajaran 2026/2027.') ?>
            </p>
            <a href="<?= esc($spmbm['cta_link'] ?? base_url('spmbm/form')) ?>"
               class="inline-flex items-center gap-2 bg-amber-500 text-white px-8 py-4 rounded-lg font-medium hover:bg-amber-600 transition-all transform hover:scale-105 shadow-lg">
                <?= esc($spmbm['cta'] ?? 'Daftar Sekarang') ?>
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>
    </div>
</section>

<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <?php if (session()->getFlashdata('spmbm_success')): ?>
        <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg p-4 text-sm">
            <?= esc(session()->getFlashdata('spmbm_success')) ?>
        </div>
        <?php endif; ?>

        <!-- Alur Pendaftaran -->
        <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="list-checks" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Alur Pendaftaran</h2>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                $alur = [
                    ['icon' => 'monitor',       'label' => 'Pendaftaran Online'],
                    ['icon' => 'file-check',    'label' => 'Verifikasi Dokumen'],
                    ['icon' => 'pencil-line',   'label' => 'Tes Seleksi'],
                    ['icon' => 'megaphone',     'label' => 'Pengumuman & Daftar Ulang'],
                ];
                foreach ($alur as $i => $step):
                ?>
                <div class="border border-gray-200 rounded-lg p-5 text-center hover:border-emerald-200 hover:bg-emerald-50/30 transition-colors">
                    <div class="w-10 h-10 bg-emerald-600 text-white rounded-full flex items-center justify-center font-bold mx-auto mb-3">
                        <?= $i + 1 ?>
                    </div>
                    <i data-lucide="<?= $step['icon'] ?>" class="w-5 h-5 text-emerald-600 mx-auto mb-2"></i>
                    <p class="text-sm font-medium text-gray-700"><?= esc($step['label']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Persyaratan -->
        <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="clipboard-list" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Persyaratan Pendaftaran</h2>
            </div>
            <?php if (!empty($requirements)): ?>
            <ul class="space-y-3">
                <?php foreach ($requirements as $r): ?>
                <li class="flex items-start gap-3 text-gray-700 text-sm">
                    <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                    <span><?= esc($r['text'] ?? ($r['keterangan'] ?? '')) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p class="text-gray-400 italic text-center py-8">Persyaratan belum tersedia.</p>
            <?php endif; ?>
        </section>

        <!-- Jadwal / Timeline -->
        <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="calendar-clock" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Jadwal Pendaftaran</h2>
            </div>
            <?php if (!empty($timeline)): ?>
            <div class="space-y-3">
                <?php foreach ($timeline as $t): ?>
                <div class="flex flex-wrap items-center gap-4 border border-gray-200 rounded-lg p-4">
                    <span class="text-sm font-semibold text-emerald-600 min-w-[140px]"><?= esc($t['tanggal'] ?? '') ?></span>
                    <span class="text-gray-900 font-medium"><?= esc($t['kegiatan'] ?? ($t['title'] ?? '')) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="text-gray-400 italic text-center py-8">Jadwal belum tersedia.</p>
            <?php endif; ?>
        </section>

        <!-- Biaya Pendidikan -->
        <section class="bg-white rounded-xl shadow-sm p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <i data-lucide="wallet" class="w-6 h-6 text-emerald-600"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Biaya Pendidikan</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Rincian Biaya -->
                <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-5">
                    <p class="text-sm font-semibold text-emerald-900 mb-3">Rincian Biaya</p>
                    <?php $total = 0; ?>
                    <ul class="divide-y divide-emerald-200/70 text-sm">
                        <?php foreach ($fees ?? [] as $f): $total += ($f['amount'] ?? 0); ?>
                        <li class="flex justify-between py-2">
                            <span class="text-emerald-800"><?= esc($f['label'] ?? '') ?></span>
                            <span class="font-medium text-emerald-900">Rp <?= number_format($f['amount'] ?? 0, 0, ',', '.') ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="border-t border-emerald-300 mt-2 pt-3 flex justify-between font-bold text-emerald-900">
                        <span>Total</span>
                        <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
                    </div>
                </div>

                <!-- Fasilitas + CTA -->
                <div>
                    <p class="text-sm font-semibold text-gray-900 mb-3">Fasilitas & Program</p>
                    <ul class="space-y-2 mb-6">
                        <?php
                        $fasilitas = ['Pembelajaran agama dan umum', 'Bimbingan intensif', 'Fasilitas pendukung'];
                        foreach ($fasilitas as $f):
                        ?>
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                            <span><?= esc($f) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="bg-gradient-to-br from-emerald-700 to-teal-800 rounded-xl p-6 text-white text-center">
                        <p class="font-semibold mb-1">Butuh Informasi Lebih Lanjut?</p>
                        <p class="text-emerald-100 text-sm mb-4">Tim panitia SPMBM siap membantu menjawab pertanyaan Anda.</p>
                        <a href="<?= base_url('/kontak') ?>"
                           class="inline-block bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<?= $this->endSection() ?>