<div>
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="bg-emerald-600 text-white rounded-2xl p-8 text-center mb-6">
                <h1 class="text-2xl font-bold"><?= esc($spmbm['title'] ?? 'Sistem Penerimaan Murid Baru Madrasah (SPMBM)') ?></h1>
                <p class="mt-2"><?= esc($spmbm['subtitle'] ?? '') ?></p>
                <a href="<?= esc($spmbm['cta_link'] ?? base_url('spmbm/form')) ?>" class="mt-4 inline-block bg-amber-500 text-white px-6 py-3 rounded-lg"><?= esc($spmbm['cta'] ?? 'Daftar Sekarang') ?></a>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow mb-6">
                <h3 class="font-semibold mb-4">Alur Pendaftaran</h3>
                <div class="grid md:grid-cols-4 gap-4">
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-emerald-600">1</div>
                        <div class="mt-2 text-sm">Pendaftaran Online</div>
                    </div>
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-emerald-600">2</div>
                        <div class="mt-2 text-sm">Verifikasi Dokumen</div>
                    </div>
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-emerald-600">3</div>
                        <div class="mt-2 text-sm">Tes Seleksi</div>
                    </div>
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-emerald-600">4</div>
                        <div class="mt-2 text-sm">Pengumuman & Daftar Ulang</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow mb-6">
                <h3 class="font-semibold mb-4">Persyaratan Pendaftaran</h3>
                <ul class="list-disc list-inside text-gray-700">
                    <?php foreach ($requirements ?? [] as $r): ?>
                        <li><?= esc($r['text'] ?? ($r['keterangan'] ?? '')) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow mb-6">
                <h3 class="font-semibold mb-4">Jadwal Pendaftaran / Timeline</h3>
                <div class="space-y-3">
                    <?php foreach ($timeline ?? [] as $t): ?>
                        <div class="border rounded p-3">
                            <div class="text-sm text-gray-500"><?= esc($t['tanggal'] ?? '') ?></div>
                            <div class="font-medium"><?= esc($t['kegiatan'] ?? ($t['title'] ?? '')) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow mb-6">
                <h3 class="font-semibold mb-4">Biaya Pendidikan</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-emerald-50 p-4 rounded">
                        <?php $total = 0; foreach ($fees ?? [] as $f): $total += ($f['amount'] ?? 0); endforeach; ?>
                        <div class="text-sm text-gray-600">Rincian Biaya</div>
                        <ul class="mt-2 text-gray-700">
                            <?php foreach ($fees ?? [] as $f): ?>
                                <li class="flex justify-between py-1"><span><?= esc($f['label'] ?? '') ?></span><span class="font-medium">Rp <?= number_format($f['amount'] ?? 0,0,',','.') ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="border-t mt-3 pt-3 font-semibold flex justify-between">Total <span>Rp <?= number_format($total,0,',','.') ?></span></div>
                    </div>

                    <div>
                        <h4 class="font-semibold">Fasilitas Program Rancangan</h4>
                        <div class="mt-2 text-gray-600">- Pembelajaran agama dan umum; - Bimbingan intensif; - Fasilitas pendukung</div>

                        <div class="mt-6 bg-emerald-600 text-white p-4 rounded text-center">
                            <div class="font-semibold">Butuh Informasi Lebih Lanjut?</div>
                            <p class="text-sm mt-2">Tim panitia SPMBM siap membantu menjawab pertanyaan Anda.</p>
                            <a href="<?= base_url('kontak') ?>" class="inline-block mt-3 bg-white text-emerald-700 px-4 py-2 rounded">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="py-12">
    <div class="container mx-auto px-4">
        <h1 class="mb-4">SPMBM</h1>
        <p class="text-gray-600">Informasi pendaftaran — tautan ke formulir.</p>

        <?php if (session()->getFlashdata('spmbm_success')): ?>
            <div class="mb-4 bg-emerald-50 border border-emerald-200 rounded p-4 text-emerald-800">
                <?= esc(session()->getFlashdata('spmbm_success')) ?>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('spmbm/form') ?>" class="mt-4 inline-block bg-amber-500 text-white px-4 py-2 rounded">Daftar Sekarang</a>
    </div>
</div>
