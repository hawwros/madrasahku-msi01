<div>
    <!-- Hero -->
    <section class="relative h-96 overflow-hidden">
        <?php if (!empty($heroSlides)): foreach ($heroSlides as $i => $slide): ?>
            <div class="absolute inset-0 hero-slide <?= $i === 0 ? 'opacity-100' : 'opacity-0' ?> transition-opacity duration-700">
                <img src="<?= esc($slide['image']) ?>" alt="<?= esc($slide['title']) ?>" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/80 via-emerald-800/40 to-transparent flex items-center">
                    <div class="container mx-auto px-4 text-white max-w-3xl">
                        <div class="inline-block px-4 py-2 bg-amber-500 rounded-full text-sm mb-4">✨ Sekolah Islam Terbaik di Pekalongan</div>
                        <h1 class="text-3xl font-bold mb-4"><?= esc($slide['title']) ?></h1>
                        <p class="text-lg mb-6"><?= esc($slide['subtitle']) ?></p>
                        <a href="<?= base_url('spmbm') ?>" class="bg-amber-500 text-white px-6 py-3 rounded-lg inline-block"><?= esc($slide['cta']) ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </section>

    <!-- Statistik -->
    <section class="py-12 bg-gradient-to-br from-emerald-600 to-teal-800 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php foreach ($statistik ?? [] as $s): ?>
                    <div class="text-center">
                        <div class="text-3xl font-bold"><?= esc($s['angka']) ?></div>
                        <div class="text-sm opacity-90"><?= esc($s['label']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<!-- Carousel JS -->
<script>
document.addEventListener('DOMContentLoaded', function(){
    try {
        var slides = document.querySelectorAll('.hero-slide');
        if (!slides || slides.length <= 1) return;
        var current = 0;
        slides.forEach(function(s, idx){
            if (idx !== 0) s.classList.add('opacity-0');
        });
        setInterval(function(){
            slides[current].classList.remove('opacity-100');
            slides[current].classList.add('opacity-0');
            current = (current + 1) % slides.length;
            slides[current].classList.remove('opacity-0');
            slides[current].classList.add('opacity-100');
        }, 5000);
    } catch (e) { console && console.error && console.error(e); }
});
</script>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1762438136374-b2fe754053f0?w=1200" alt="Kepala Sekolah" class="rounded-2xl shadow-lg w-full h-80 object-cover" />
                </div>
                <div>
                    <div class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full mb-4">Sambutan Kepala Madrasah</div>
                    <h2 class="mb-4">Bismillahirrahmanirrahim</h2>
                    <p class="text-gray-600 mb-4">Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT...</p>
                    <div class="border-l-4 border-emerald-600 pl-4">
                        <p class="font-bold">Dr. H. Ahmad Syarif, M.Pd.I</p>
                        <p class="text-gray-600">Kepala Madrasah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <div class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full mb-4">Keunggulan Kami</div>
                <h2>Mengapa Memilih Madrasahku?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($fiturUnggulan ?? [] as $f): ?>
                    <div class="bg-white p-6 rounded-2xl shadow-sm">
                        <h3 class="font-semibold mb-2"><?= esc($f['title']) ?></h3>
                        <p class="text-sm text-gray-600"><?= esc($f['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Pengumuman -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <div class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-full mb-2">Informasi Terkini</div>
                    <h2>Pengumuman Terbaru</h2>
                </div>
                <a href="<?= base_url('pengumuman') ?>" class="text-emerald-600">Lihat Semua</a>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <?php if (!empty($pengumuman)): foreach ($pengumuman as $p): ?>
                    <div class="border rounded-2xl p-4">
                        <div class="text-sm text-gray-500 mb-2"><?= date('d M Y', strtotime($p['tanggal'] ?? date('Y-m-d'))) ?></div>
                        <div class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs mb-2"><?= esc($p['kategori'] ?? 'Umum') ?></div>
                        <h3 class="font-semibold mb-2"><?= esc($p['judul']) ?></h3>
                        <p class="text-gray-600 text-sm"><?= esc($p['konten'] ?? '') ?></p>
                    </div>
                <?php endforeach; else: ?>
                    <div class="col-span-3 text-center text-gray-500">Belum ada pengumuman.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="py-12 bg-gradient-to-br from-emerald-600 to-teal-800 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2>Apa Kata Mereka?</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <?php foreach ($testimonials ?? [] as $t): ?>
                    <div class="bg-white/10 rounded-2xl p-6">
                        <p class="italic mb-4">"<?= esc($t['testimoni']) ?>"</p>
                        <div class="flex items-center gap-3">
                            <img src="<?= esc($t['foto']) ?>" alt="<?= esc($t['nama']) ?>" class="w-12 h-12 rounded-full object-cover" />
                            <div>
                                <div class="font-medium"><?= esc($t['nama']) ?></div>
                                <div class="text-sm text-emerald-200"><?= esc($t['role']) ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 text-center">
            <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-3xl p-8 text-white">
                <h3 class="text-2xl mb-4">Bergabunglah Bersama Kami</h3>
                <p class="mb-6">Daftarkan putra-putri Anda untuk mendapatkan pendidikan Islam yang berkualitas.</p>
                <a href="<?= base_url('spmbm/form') ?>" class="bg-amber-500 px-6 py-3 rounded-lg text-white">Daftar Sekarang</a>
            </div>
        </div>
    </section>
</div>
