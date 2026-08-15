<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* Custom Animations for Premium Feel */
    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
        50% { box-shadow: 0 0 20px 5px rgba(245, 158, 11, 0.7); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    .animate-pulse-glow {
        animation: pulse-glow 2.5s infinite;
    }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
</style>

<!-- Hero Section -->
<section class="relative min-h-[500px] flex items-center overflow-hidden bg-gray-900 pt-10 pb-20">
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 opacity-90"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-teal-500/20 rounded-full blur-[100px] transform translate-x-1/3 -translate-y-1/4"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-emerald-500/20 rounded-full blur-[80px] transform -translate-x-1/3 translate-y-1/3"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-30"></div>
    </div>

    <div class="container mx-auto px-4 z-10 relative">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-800/50 border border-emerald-600/50 backdrop-blur-md rounded-full text-emerald-100 text-sm font-medium mb-6 opacity-0 animate-fade-in-up">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                </span>
                Pendaftaran Telah Dibuka!
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 text-white tracking-tight leading-tight opacity-0 animate-fade-in-up delay-100">
                <?= esc($spmbm['title'] ?? 'Sistem Penerimaan Murid Baru Madrasah') ?>
            </h1>
            
            <p class="text-lg md:text-1xl text-emerald-100/90 max-w-3xl mx-auto mb-10 leading-relaxed opacity-0 animate-fade-in-up delay-200 font-light">
                <?= esc($spmbm['subtitle'] ?? 'Daftarkan putra-putri Anda di ' . ($settings['nama_madrasah'] ?? 'Madrasahku') . ' — kuota terbatas, tahun pelajaran 2026/2027.') ?>
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 opacity-0 animate-fade-in-up delay-300">
                <a href="<?= esc($spmbm['cta_link'] ?? base_url('spmbm/form')) ?>"
                   class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-amber-500 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-amber-400 transition-all transform hover:-translate-y-1 hover:scale-[1.02] animate-pulse-glow">
                    <span>Formulir Pendaftaran</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <!-- <a href="#biaya" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/20 px-8 py-4 rounded-xl font-medium transition-colors backdrop-blur-sm">
                    Lihat Informasi Biaya
                </a> -->
            </div>

            <!-- Social Proof / Stats -->
            <div class="mt-12 flex items-center justify-center gap-6 text-emerald-100/60 text-sm opacity-0 animate-fade-in-up delay-300">
                <div class="flex items-center gap-2">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Ribuan Lulusan Sukses</span>
                </div>
                <div class="w-1 h-1 rounded-full bg-emerald-500/50"></div>
                <div class="flex items-center gap-2">
                    <i data-lucide="award" class="w-4 h-4"></i>
                    <span>Akreditasi A</span>
                </div>
                <div class="w-1 h-1 rounded-full bg-emerald-500/50"></div>
                <div class="flex items-center gap-2">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                    <span>Kurikulum Terpadu</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Wrapper -->
<div class="py-16 bg-gray-50/50">
    <div class="container mx-auto px-4 max-w-6xl">

        <?php if (session()->getFlashdata('spmbm_success')): ?>
        <div class="mb-10 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg p-4 shadow-sm flex items-start gap-3">
            <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-600 flex-shrink-0"></i>
            <div>
                <p class="text-emerald-800 font-medium">Berhasil!</p>
                <p class="text-emerald-700 text-sm"><?= esc(session()->getFlashdata('spmbm_success')) ?></p>
            </div>
        </div>
        <?php endif; ?>

        <!-- Alur Pendaftaran -->
        <section class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">Alur Pendaftaran</h2>
                <div class="w-20 h-1 bg-amber-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6 relative">
                <!-- Connecting Line (hidden on mobile) -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-200 -z-10 transform -translate-y-1/2"></div>
                
                <?php
                $alur = [
                    ['icon' => 'monitor',       'label' => 'Pendaftaran Online', 'desc' => 'Isi formulir dari rumah.'],
                    ['icon' => 'file-check',    'label' => 'Verifikasi Dokumen', 'desc' => 'Panitia memvalidasi data.'],
                    ['icon' => 'pencil-line',   'label' => 'Tes Seleksi', 'desc' => 'Ujian kemampuan dasar.'],
                    ['icon' => 'megaphone',     'label' => 'Pengumuman & Daftar Ulang', 'desc' => 'Hasil kelulusan dirilis.'],
                ];
                foreach ($alur as $i => $step):
                ?>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-emerald-200 transition-all duration-300 hover:-translate-y-2 group relative">
                    <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 group-hover:bg-emerald-600 transition-all duration-300 shadow-sm group-hover:shadow-emerald-500/30">
                        <i data-lucide="<?= $step['icon'] ?>" class="w-7 h-7 text-emerald-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    
                    <!-- Number Badge -->
                    <div class="absolute -top-3 -right-3 w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg border-2 border-white">
                        <?= $i + 1 ?>
                    </div>
                    
                    <h3 class="text-lg font-bold text-gray-900 mb-2 text-center group-hover:text-emerald-700 transition-colors"><?= esc($step['label']) ?></h3>
                    <p class="text-gray-500 text-sm text-center"><?= esc($step['desc']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Persyaratan & Jadwal (Side by Side on Desktop) -->
        <div class="grid lg:grid-cols-2 gap-8 mb-16">
            
            <!-- Persyaratan -->
            <section class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-amber-100 p-3.5 rounded-xl shadow-inner">
                        <i data-lucide="clipboard-list" class="w-6 h-6 text-amber-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Persyaratan</h2>
                </div>
                
                <?php if (!empty($requirements)): ?>
                <div class="grid sm:grid-cols-1 gap-4">
                    <?php foreach ($requirements as $r): ?>
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50/50 hover:bg-emerald-50 border border-transparent hover:border-emerald-100 transition-colors">
                        <div class="mt-0.5 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-600"></i>
                        </div>
                        <span class="text-gray-700 font-medium"><?= esc($r['text'] ?? ($r['keterangan'] ?? '')) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div class="flex flex-col items-center justify-center py-10 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                    <i data-lucide="inbox" class="w-10 h-10 text-gray-400 mb-3"></i>
                    <p class="text-gray-500 italic text-sm">Persyaratan belum tersedia.</p>
                </div>
                <?php endif; ?>
            </section>

            <!-- Jadwal / Timeline -->
            <section class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-emerald-100 p-3.5 rounded-xl shadow-inner">
                        <i data-lucide="calendar-clock" class="w-6 h-6 text-emerald-700"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Jadwal Pelaksanaan</h2>
                </div>
                
                <?php if (!empty($timeline)): ?>
                <div class="relative pl-6 space-y-6 before:content-[''] before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-0.5 before:bg-gray-100">
                    <?php foreach ($timeline as $t): ?>
                    <div class="relative group">
                        <!-- Timeline Dot -->
                        <div class="absolute -left-[30px] top-1 w-4 h-4 rounded-full bg-white border-4 border-emerald-500 group-hover:scale-125 group-hover:border-amber-500 transition-all duration-300"></div>
                        
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 group-hover:border-emerald-200 group-hover:bg-emerald-50/50 transition-colors">
                            <span class="inline-block text-xs font-bold text-amber-600 bg-amber-100 px-2.5 py-1 rounded-md mb-2"><?= esc($t['tanggal'] ?? '') ?></span>
                            <h4 class="text-gray-900 font-bold group-hover:text-emerald-800 transition-colors"><?= esc($t['kegiatan'] ?? ($t['title'] ?? '')) ?></h4>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div class="flex flex-col items-center justify-center py-10 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                    <i data-lucide="calendar-x" class="w-10 h-10 text-gray-400 mb-3"></i>
                    <p class="text-gray-500 italic text-sm">Jadwal belum tersedia.</p>
                </div>
                <?php endif; ?>
            </section>
            
        </div>

        <!-- Biaya Pendidikan -->
        <section id="biaya" class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">Investasi Pendidikan</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Rincian biaya pendidikan yang transparan dengan fasilitas terbaik untuk mendukung proses belajar.</p>
            </div>
            
            <div class="grid md:grid-cols-12 gap-8 max-w-5xl mx-auto">
                
                <!-- Fasilitas -->
                <div class="md:col-span-5 flex flex-col justify-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <i data-lucide="sparkles" class="w-5 h-5 text-amber-500"></i>
                        Fasilitas & Keunggulan
                    </h3>
                    <ul class="space-y-4">
                        <?php
                        $fasilitas = [
                            ['title' => 'Pembelajaran Agama & Umum', 'desc' => 'Kurikulum terpadu untuk dunia dan akhirat.'],
                            ['title' => 'Bimbingan Intensif', 'desc' => 'Pendampingan belajar yang personal.'],
                            ['title' => 'Fasilitas Modern', 'desc' => 'Ruang kelas nyaman dan lab lengkap.'],
                            ['title' => 'Ekstrakurikuler', 'desc' => 'Beragam pilihan untuk minat bakat.']
                        ];
                        foreach ($fasilitas as $f):
                        ?>
                        <li class="flex items-start gap-4 group">
                            <div class="mt-1 bg-emerald-100 p-2 rounded-lg group-hover:bg-emerald-600 transition-colors">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-600 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm"><?= esc($f['title']) ?></h4>
                                <p class="text-gray-500 text-sm mt-0.5"><?= esc($f['desc']) ?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Price Card -->
                <div class="md:col-span-7">
                    <div class="bg-gradient-to-b from-white to-gray-50 rounded-3xl p-8 border border-gray-200 shadow-xl relative overflow-hidden">
                        <!-- Ribbon -->
                        <div class="absolute top-6 -right-12 bg-emerald-600 text-white font-bold text-xs py-1 px-12 transform rotate-45 shadow-sm">
                            TERBAIK
                        </div>

                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center">
                                <i data-lucide="wallet" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Rincian Biaya Masuk</h3>
                                <p class="text-gray-500 text-sm">Sekali bayar saat daftar ulang</p>
                            </div>
                        </div>
                        
                        <?php $total = 0; ?>
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm mb-6">
                            <ul class="divide-y divide-gray-100">
                                <?php foreach ($fees ?? [] as $f): $total += ($f['amount'] ?? 0); ?>
                                <li class="flex justify-between items-center py-3 first:pt-0 last:pb-0">
                                    <span class="text-gray-600 font-medium"><?= esc($f['label'] ?? '') ?></span>
                                    <span class="font-bold text-gray-900">Rp <?= number_format($f['amount'] ?? 0, 0, ',', '.') ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-emerald-900 rounded-2xl text-white shadow-inner">
                            <div>
                                <span class="block text-emerald-300 text-sm font-medium mb-1">Total Biaya</span>
                                <span class="text-3xl font-extrabold tracking-tight">Rp <?= number_format($total, 0, ',', '.') ?></span>
                            </div>
                            <i data-lucide="calculator" class="w-8 h-8 text-emerald-500 opacity-50"></i>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

    </div>
</div>

<!-- Massive Bottom CTA -->
<section class="relative bg-emerald-900 py-20 overflow-hidden">
    <!-- Background Patterns -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-[100px] transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-[100px] transform -translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Butuh informasi lebihi lanjut?</h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto">Tim Panitia SPMBM siap membantu lebih lanjut.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <!-- <a href="<?= esc($spmbm['cta_link'] ?? base_url('spmbm/form')) ?>"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-amber-500 text-white px-10 py-5 rounded-2xl font-bold text-xl hover:bg-amber-400 transition-all transform hover:-translate-y-2 hover:shadow-[0_20px_40px_-15px_rgba(245,158,11,0.5)]">
                <i data-lucide="edit-3" class="w-6 h-6"></i>
                Isi Formulir Sekarang
            </a> -->
            <a href="<?= base_url('/kontak') ?>"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 text-white bg-white/10 hover:bg-white/20 border border-white/30 px-8 py-5 rounded-2xl font-semibold transition-all">
                <i data-lucide="phone-call" class="w-5 h-5"></i>
                Hubungi Panitia
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>