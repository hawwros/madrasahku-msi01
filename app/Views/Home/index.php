<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- ========================
     HERO CAROUSEL
========================= -->
<section class="relative h-[480px] md:h-[600px] overflow-hidden" id="heroCarousel">
    <?php if (!empty($hero)): ?>
        <?php foreach ($hero as $idx => $slide): ?>
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 <?= $idx === 0 ? 'opacity-100' : 'opacity-0' ?>"
             data-index="<?= $idx ?>">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/90 via-emerald-800/70 to-transparent z-10"></div>
            <?php if (!empty($slide['gambar']) && file_exists(FCPATH . 'assets/images/' . $slide['gambar'])): ?>
                <img src="<?= base_url('assets/images/' . esc($slide['gambar'])) ?>"
                     alt="<?= esc($slide['judul']) ?>"
                     class="w-full h-full object-cover">
            <?php else: ?>
                <div class="w-full h-full bg-gradient-to-br from-emerald-800 to-teal-900"></div>
            <?php endif; ?>
            <div class="absolute inset-0 z-20 flex items-center">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl text-white">
                        <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-4 font-medium animate-fade-in">
                            ✨ Sekolah Islam Terbaik di <?= esc($settings['kota'] ?? 'Pekalongan') ?>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-bold mb-4 md:mb-6 leading-tight text-white">
                            <?= esc($slide['judul']) ?>
                        </h1>
                        <p class="text-base md:text-xl mb-6 md:mb-8 text-emerald-50">
                            <?= esc($slide['subtitle']) ?>
                        </p>
                        <div class="flex flex-wrap gap-3 md:gap-4">
                            <a href="<?= base_url('/spmbm') ?>"
                               class="inline-flex items-center gap-2 bg-amber-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg font-medium hover:bg-amber-600 transition-all transform hover:scale-105 shadow-lg">
                                <?= esc($slide['teks_tombol'] ?? 'Daftar Sekarang') ?>
                                <i data-lucide="arrow-right" class="w-5 h-5"></i>
                            </a>
                            <a href="<?= base_url('/profil') ?>"
                               class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white px-6 md:px-8 py-3 md:py-4 rounded-lg font-medium hover:bg-white/30 transition-all border border-white/40">
                                Tentang Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-6 md:bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-2" id="carouselIndicators">
            <?php foreach ($hero as $idx => $slide): ?>
            <button class="carousel-dot h-2.5 rounded-full transition-all <?= $idx === 0 ? 'w-8 bg-amber-500' : 'w-2.5 bg-white/50 hover:bg-white/70' ?>"
                    data-index="<?= $idx ?>"
                    aria-label="Slide <?= $idx + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Default hero jika tidak ada data -->
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/90 to-teal-800 z-10 flex items-center">
            <div class="container mx-auto px-4 text-white text-center">
                <h1 class="text-5xl font-bold mb-4"><?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?></h1>
                <p class="text-xl text-emerald-100"><?= esc($settings['tagline'] ?? '') ?></p>
            </div>
        </div>
    <?php endif; ?>
</section>

<!-- ========================
     STATISTIK
========================= -->
<section class="py-16 bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(circle_at_center,_white_1px,_transparent_1px)] bg-[size:24px_24px]"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
            $statIkons = [
                'users'          => 'users',
                'graduation-cap' => 'graduation-cap',
                'trophy'         => 'trophy',
                'award'          => 'award',
                'star'           => 'star',
            ];
            $statColors = [
                'from-emerald-500 to-teal-600'  => 'from-emerald-500 to-teal-600',
                'from-amber-500 to-orange-600'  => 'from-amber-500 to-orange-600',
                'from-blue-500 to-indigo-600'   => 'from-blue-500 to-indigo-600',
                'from-purple-500 to-pink-600'   => 'from-purple-500 to-pink-600',
            ];
            // Ensure $statistik is defined and is an array to avoid undefined variable errors
            if (!isset($statistik) || !is_array($statistik)) {
                $statistik = [];
            }
            foreach ($statistik as $item):
                $ikon = $statIkons[$item['ikon']] ?? 'star';
                $color = $item['warna'] ?? 'from-emerald-500 to-teal-600';
            ?>
            <div class="text-center group">
                <div class="bg-gradient-to-br <?= esc($color) ?> w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl group-hover:scale-110 transition-transform">
                    <i data-lucide="<?= esc($ikon) ?>" class="w-10 h-10 text-white"></i>
                </div>
                <div class="text-4xl font-bold text-white mb-2"><?= esc($item['angka']) ?></div>
                <div class="text-emerald-100"><?= esc($item['label']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================
     SAMBUTAN KEPALA MADRASAH
========================= -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Foto -->
            <div class="relative order-2 md:order-1">
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-amber-200 rounded-full opacity-50 blur-2xl"></div>
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-emerald-200 rounded-full opacity-50 blur-2xl"></div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <?php $fotoKepala = $settings['foto_kepala'] ?? ''; ?>
                    <?php if (!empty($fotoKepala) && file_exists(FCPATH . 'assets/images/guru/' . $fotoKepala)): ?>
                        <img src="<?= base_url('assets/images/guru/' . esc($fotoKepala)) ?>"
                             alt="Kepala Madrasah"
                             class="w-full h-[500px] object-cover">
                    <?php else: ?>
                        <div class="w-full h-[500px] bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
                            <div class="text-center p-8">
                                <div class="w-32 h-32 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                                    <i data-lucide="user" class="w-16 h-16 text-white"></i>
                                </div>
                                <p class="text-emerald-700 font-medium"><?= esc($settings['kepala_madrasah'] ?? 'Kepala Madrasah') ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Teks Sambutan -->
            <div class="order-1 md:order-2">
                <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm mb-4 font-medium">
                    Sambutan Kepala Madrasah
                </div>
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-900">Bismillahirrahmanirrahim</h2>
                <?php
                $sambutan = $settings['sambutan_kepala'] ?? '';
                $paragraf = array_filter(explode("\n\n", $sambutan));
                foreach ($paragraf as $p):
                    if (trim($p)):
                ?>
                <p class="text-gray-600 mb-4 leading-relaxed"><?= esc(trim($p)) ?></p>
                <?php
                    endif;
                endforeach;
                ?>
                <div class="border-l-4 border-emerald-600 pl-4 mt-6">
                    <p class="font-bold text-gray-900"><?= esc($settings['kepala_madrasah'] ?? 'Kepala Madrasah') ?></p>
                    <p class="text-gray-600">Kepala Madrasah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     FITUR UNGGULAN
========================= -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50/30">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm mb-4 font-medium">
                Keunggulan Kami
            </div>
            <h2 class="text-3xl font-bold mb-4 text-gray-900">Mengapa Memilih <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Kami berkomitmen memberikan pendidikan terbaik dengan berbagai keunggulan
                yang mendukung perkembangan optimal peserta didik.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $fiturUnggulan = [
                [
                    'icon' => 'book-open',
                    'title' => 'Kurikulum Terintegrasi',
                    'description' => 'Perpaduan kurikulum nasional dengan nilai-nilai Islam yang komprehensif',
                    'color' => 'bg-gradient-to-br from-emerald-50 to-teal-50 border-emerald-200',
                    'iconColor' => 'from-emerald-500 to-teal-600'
                ],
                [
                    'icon' => 'users',
                    'title' => 'Tenaga Pendidik Profesional',
                    'description' => 'Guru berkualitas dan berpengalaman dalam bidang pendidikan Islam',
                    'color' => 'bg-gradient-to-br from-amber-50 to-orange-50 border-amber-200',
                    'iconColor' => 'from-amber-500 to-orange-600'
                ],
                [
                    'icon' => 'award',
                    'title' => 'Prestasi Gemilang',
                    'description' => 'Siswa berprestasi di tingkat regional dan nasional',
                    'color' => 'bg-gradient-to-br from-blue-50 to-indigo-50 border-blue-200',
                    'iconColor' => 'from-blue-500 to-indigo-600'
                ],
                [
                    'icon' => 'building-2',
                    'title' => 'Fasilitas Lengkap',
                    'description' => 'Sarana dan prasarana pendukung pembelajaran yang modern',
                    'color' => 'bg-gradient-to-br from-purple-50 to-pink-50 border-purple-200',
                    'iconColor' => 'from-purple-500 to-pink-600'
                ],
            ];
            foreach ($fiturUnggulan as $fitur):
            ?>
            <div class="<?= $fitur['color'] ?> border-2 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all transform hover:-translate-y-2 duration-300">
                <div class="bg-gradient-to-br <?= $fitur['iconColor'] ?> w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                    <i data-lucide="<?= $fitur['icon'] ?>" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3 text-gray-900"><?= $fitur['title'] ?></h3>
                <p class="text-gray-600 text-sm leading-relaxed"><?= $fitur['description'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================
     PENGUMUMAN TERBARU
========================= -->
<?php if (!empty($pengumuman)): ?>
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-12">
            <div>
                <div class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm mb-4 font-medium">
                    Informasi Terkini
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Pengumuman Terbaru</h2>
            </div>
            <a href="<?= base_url('/pengumuman') ?>"
               class="text-emerald-600 hover:text-emerald-700 font-medium flex items-center gap-2 group">
                Lihat Semua
                <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <?php
            $kategoriColors = [
                'Akademik'        => 'bg-blue-100 text-blue-700',
                'SPMBM'            => 'bg-emerald-100 text-emerald-700',
                'Keagamaan'       => 'bg-purple-100 text-purple-700',
                'Keuangan'        => 'bg-orange-100 text-orange-700',
                'Ekstrakurikuler' => 'bg-pink-100 text-pink-700',
                'Beasiswa'        => 'bg-yellow-100 text-yellow-700',
                'Teknologi'       => 'bg-gray-100 text-gray-700',
                'Umum'            => 'bg-slate-100 text-slate-700',
            ];
            foreach ($pengumuman as $item):
                $badgeColor = $kategoriColors[$item['kategori']] ?? 'bg-gray-100 text-gray-700';
                $tgl = date('d M Y', strtotime($item['created_at']));
            ?>
            <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-gray-200 rounded-2xl p-6 hover:shadow-xl transition-all group cursor-pointer">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-emerald-100 p-2 rounded-lg">
                        <i data-lucide="calendar" class="w-5 h-5 text-emerald-600"></i>
                    </div>
                    <span class="text-sm text-gray-500"><?= esc($tgl) ?></span>
                </div>
                <div class="inline-block px-3 py-1 <?= $badgeColor ?> rounded-full text-xs mb-3 font-medium">
                    <?= esc($item['kategori']) ?>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors line-clamp-2">
                    <?= esc($item['judul']) ?>
                </h3>
                <p class="text-gray-600 text-sm line-clamp-2"><?= esc($item['konten']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ========================
     TESTIMONI
========================= -->
<?php if (!empty($testimoni)): ?>
<section class="py-20 bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-800 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(circle_at_center,_white_1px,_transparent_1px)] bg-[size:24px_24px]"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-full text-sm mb-4 font-medium">
                Testimoni
            </div>
            <h2 class="text-3xl font-bold mb-4 text-white">Apa Kata Mereka?</h2>
            <p class="text-emerald-50 max-w-2xl mx-auto">
                Kepercayaan dan kepuasan dari wali murid dan alumni adalah kebanggaan kami
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($testimoni as $item): ?>
            <div class="bg-white/10 backdrop-blur-lg border-2 border-white/20 rounded-2xl p-6 hover:bg-white/15 transition-all">
                <!-- Bintang -->
                <div class="flex gap-1 mb-4">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                    <i data-lucide="star" class="w-5 h-5 <?= $i < ($item['rating'] ?? 5) ? 'text-amber-400 fill-amber-400' : 'text-gray-400' ?>"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-emerald-50 mb-6 italic leading-relaxed">
                    "<?= esc($item['testimoni']) ?>"
                </p>
                <div class="flex items-center gap-3">
                    <?php if (!empty($item['foto']) && file_exists(FCPATH . 'assets/images/guru/' . $item['foto'])): ?>
                        <img src="<?= base_url('assets/images/guru/' . esc($item['foto'])) ?>"
                             alt="<?= esc($item['nama']) ?>"
                             class="w-12 h-12 rounded-full object-cover border-2 border-white/30">
                    <?php else: ?>
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 border-2 border-white/30 flex items-center justify-center">
                            <span class="text-white font-bold text-lg"><?= strtoupper(substr($item['nama'], 0, 1)) ?></span>
                        </div>
                    <?php endif; ?>
                    <div>
                        <p class="font-medium text-white"><?= esc($item['nama']) ?></p>
                        <p class="text-sm text-emerald-200"><?= esc($item['role']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ========================
     CTA SPMBM
========================= -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="relative bg-gradient-to-r from-emerald-600 via-emerald-700 to-teal-800 rounded-3xl p-12 md:p-16 text-white text-center overflow-hidden shadow-2xl">
            <div class="absolute inset-0 opacity-5 bg-[radial-gradient(circle_at_center,_white_1px,_transparent_1px)] bg-[size:20px_20px]"></div>
            <div class="relative z-10">
                <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-6 font-medium">
                    🎓 SPMBM <?= esc($spmbmInfo['tahun_ajaran'] ?? '2026/2027') ?>
                </div>
                <h2 class="mb-6 text-white text-3xl md:text-4xl font-bold">Bergabunglah Bersama Kami</h2>
                <p class="text-emerald-50 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
                    Daftarkan putra-putri Anda untuk mendapatkan pendidikan Islam yang berkualitas
                    dan masa depan yang cerah. Pendaftaran telah dibuka!
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?= base_url('/spmbm') ?>"
                       class="inline-flex items-center gap-2 bg-amber-500 text-white px-8 py-4 rounded-lg font-medium hover:bg-amber-600 transition-all transform hover:scale-105 shadow-lg">
                        Info SPMBM
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="<?= base_url('/kontak') ?>"
                       class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-lg font-medium hover:bg-white/30 transition-all border border-white/40">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Carousel JS -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.hero-slide');
    const dots   = document.querySelectorAll('.carousel-dot');
    let current  = 0;
    let timer;

    if (slides.length <= 1) return;

    function goTo(idx) {
        slides[current].classList.remove('opacity-100');
        slides[current].classList.add('opacity-0');
        dots[current].classList.remove('w-8', 'bg-amber-500');
        dots[current].classList.add('w-2.5', 'bg-white/50');

        current = (idx + slides.length) % slides.length;

        slides[current].classList.remove('opacity-0');
        slides[current].classList.add('opacity-100');
        dots[current].classList.remove('w-2.5', 'bg-white/50');
        dots[current].classList.add('w-8', 'bg-amber-500');
    }

    function startAuto() {
        timer = setInterval(() => goTo(current + 1), 5000);
    }

    dots.forEach(dot => dot.addEventListener('click', () => {
        clearInterval(timer);
        goTo(parseInt(dot.dataset.index));
        startAuto();
    }));

    // Jeda auto-slide saat kursor di atas carousel
    const carousel = document.getElementById('heroCarousel');
    carousel?.addEventListener('mouseenter', () => clearInterval(timer));
    carousel?.addEventListener('mouseleave', startAuto);

    startAuto();
});
</script>
<?= $this->endSection() ?>