<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Hero -->
<section class="relative h-[400px] overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/95 via-emerald-800/85 to-teal-900/90 z-10"></div>
    <div class="w-full h-full bg-gradient-to-br from-emerald-800 to-teal-900"></div>
    <div class="absolute inset-0 z-20 flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-4 font-medium">Tentang Kami</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Profil Madrasah</h1>
            <p class="text-lg md:text-xl text-emerald-50 max-w-3xl mx-auto">
                Mengenal lebih dekat tentang sejarah, visi misi, struktur organisasi, dan fasilitas <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>.
            </p>
        </div>
    </div>
</section>

<div class="bg-gradient-to-br from-gray-50 to-emerald-50/30">

    <!-- Sejarah -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 p-4 rounded-2xl shadow-lg">
                        <i data-lucide="history" class="w-8 h-8 text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Sejarah Madrasah</h2>
                        <p class="text-emerald-600 text-sm">Perjalanan Kami Sejak <?= esc($settings['tahun_berdiri'] ?? '1995') ?></p>
                    </div>
                </div>
                <div class="text-gray-600 space-y-4">
                    <?php
                    $sejarah = $settings['sejarah'] ?? '';
                    $paragraf = array_filter(explode("\n\n", $sejarah));
                    foreach ($paragraf as $p):
                        if (trim($p)):
                    ?>
                    <p class="leading-relaxed"><?= esc(trim($p)) ?></p>
                    <?php
                        endif;
                    endforeach;
                    if (empty($paragraf)): ?>
                    <p class="leading-relaxed italic text-gray-400">Data sejarah belum diisi oleh admin.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="pb-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-3xl p-8 md:p-10 text-white shadow-2xl">
                    <div class="bg-white/20 backdrop-blur-sm w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="eye" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="mb-6 text-white text-2xl font-bold">Visi</h3>
                    <p class="text-emerald-50 leading-relaxed text-lg">
                        <?= esc($settings['visi'] ?? 'Data visi belum diisi.') ?>
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-2xl border-2 border-emerald-100">
                    <div class="bg-gradient-to-br from-amber-500 to-orange-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i data-lucide="target" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="mb-6 text-gray-900 text-2xl font-bold">Misi</h3>
                    <?php if (!empty($misiList)): ?>
                    <ul class="space-y-3">
                        <?php foreach ($misiList as $m): ?>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                            <span class="text-gray-600 leading-relaxed"><?= esc($m['isi']) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                    <p class="text-gray-400 italic">Data misi belum diisi.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Highlight -->
    <?php if (!empty($prestasi)): ?>
    <section class="pb-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm mb-4 font-medium">Prestasi Kami</div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">Pencapaian Terbaru</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kebanggaan kami atas prestasi siswa-siswi <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?></p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($prestasi as $item): ?>
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all border-2 border-gray-100 group hover:-translate-y-1">
                    <div class="bg-gradient-to-br from-amber-500 to-orange-600 w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                        <i data-lucide="<?= $item['ikon'] === 'award' ? 'award' : 'trophy' ?>" class="w-7 h-7 text-white"></i>
                    </div>
                    <div class="text-emerald-600 font-bold text-lg mb-2"><?= esc($item['juara']) ?></div>
                    <div class="text-gray-900 font-medium mb-1"><?= esc($item['lomba']) ?></div>
                    <div class="text-gray-500 text-sm"><?= esc($item['tahun']) ?> &bull; <?= esc($item['tingkat']) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Struktur Organisasi -->
    <?php if (!empty($strukturOrganisasi)): ?>
    <section class="pb-20">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-2xl shadow-lg">
                        <i data-lucide="users" class="w-8 h-8 text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Struktur Organisasi</h2>
                        <p class="text-blue-600 text-sm">Tim Kepemimpinan <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?></p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <?php foreach ($strukturOrganisasi as $item): ?>
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 border-2 border-emerald-200 rounded-2xl p-6 hover:shadow-lg transition-all">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-emerald-600 w-10 h-10 rounded-full flex items-center justify-center">
                                <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>
                            </div>
                            <p class="font-bold text-emerald-700"><?= esc($item['jabatan']) ?></p>
                        </div>
                        <p class="text-gray-900 font-medium text-lg"><?= esc($item['nama']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Tenaga Pendidik -->
    <?php if (!empty($tenagaPendidik)): ?>
    <section class="pb-20">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-gradient-to-br from-purple-500 to-pink-600 p-4 rounded-2xl shadow-lg">
                        <i data-lucide="book-open" class="w-8 h-8 text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Tenaga Pendidik</h2>
                        <p class="text-purple-600 text-sm">Guru Profesional dan Berpengalaman</p>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-teal-50 border-b-2 border-emerald-200">
                                <th class="text-left py-4 px-6 text-gray-700 font-semibold">Nama</th>
                                <th class="text-left py-4 px-6 text-gray-700 font-semibold">Bidang Studi</th>
                                <th class="text-left py-4 px-6 text-gray-700 font-semibold hidden md:table-cell">Pendidikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tenagaPendidik as $guru): ?>
                            <tr class="border-b border-gray-100 hover:bg-emerald-50/50 transition-colors">
                                <td class="py-4 px-6 text-gray-900 font-medium"><?= esc($guru['nama']) ?></td>
                                <td class="py-4 px-6 text-gray-600"><?= esc($guru['bidang_studi']) ?></td>
                                <td class="py-4 px-6 text-gray-600 hidden md:table-cell"><?= esc($guru['pendidikan']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p class="mt-6 text-sm text-gray-500 italic bg-amber-50 p-4 rounded-lg border border-amber-200">
                    * Sebagian dari <?= esc($settings['statistik_guru'] ?? '45') ?> tenaga pendidik profesional yang ada di <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>
                </p>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Fasilitas -->
    <?php if (!empty($fasilitas)): ?>
    <section class="pb-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm mb-4 font-medium">Fasilitas Lengkap</div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">Fasilitas Pendukung Pembelajaran</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Sarana dan prasarana modern untuk mendukung kegiatan belajar mengajar yang optimal</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($fasilitas as $item): ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all group">
                    <div class="h-56 overflow-hidden relative bg-gradient-to-br from-emerald-100 to-teal-100">
                        <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'assets/images/' . $item['gambar'])): ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <img src="<?= base_url('assets/images/' . esc($item['gambar'])) ?>"
                                 alt="<?= esc($item['nama']) ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <?php else: ?>
                            <div class="flex items-center justify-center h-full">
                                <i data-lucide="building-2" class="w-16 h-16 text-emerald-400"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 mb-2 text-lg group-hover:text-emerald-600 transition-colors"><?= esc($item['nama']) ?></h3>
                        <p class="text-gray-600 text-sm leading-relaxed"><?= esc($item['deskripsi']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div><!-- end bg-gradient -->

<?= $this->endSection() ?>