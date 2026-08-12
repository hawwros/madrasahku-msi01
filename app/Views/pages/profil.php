<div>
    <!-- Hero -->
    <section class="relative h-56 bg-emerald-600 text-white flex items-center">
        <div class="container mx-auto px-4">
            <div class="py-8">
                <div class="inline-block px-3 py-1 bg-amber-500 rounded-full mb-4 text-sm">Tentang Kami</div>
                <h1 class="text-3xl font-bold">Profil Madrasah</h1>
                <p class="opacity-90 mt-2">Mengenal lebih dekat tentang sejarah, visi misi, struktur organisasi, dan fasilitas Madrasahku Pekalongan.</p>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="font-semibold mb-3">Sejarah Madrasah</h3>
                    <p class="text-gray-600"><?= nl2br(esc($profile['sejarah'] ?? 'Belum ada sejarah terdaftar.')) ?></p>
                </div>

                <div class="space-y-6">
                    <div class="bg-emerald-600 text-white p-6 rounded-2xl">
                        <h4 class="font-bold">Visi</h4>
                        <p class="mt-2"><?= esc($profile['visi'] ?? '-') ?></p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h4 class="font-bold mb-3">Misi</h4>
                        <ul class="list-disc list-inside text-gray-600">
                            <?php foreach ($profile['misi'] ?? [] as $m): ?>
                                <li><?= esc($m) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6">
                <h2 class="text-xl font-semibold">Prestasi Terbaru</h2>
            </div>
            <div class="grid md:grid-cols-4 gap-6">
                <?php foreach ($prestasi ?? [] as $p): ?>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="text-sm text-amber-600 mb-2">Prestasi</div>
                        <div class="font-semibold"><?= esc($p['judul'] ?? ($p['judul'] ?? '')) ?></div>
                        <div class="text-xs text-gray-500"><?= esc($p['tahun'] ?? '') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6">
                <h2 class="text-xl font-semibold">Struktur Organisasi</h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($profile['struktur'] ?? [] as $s): ?>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="text-sm text-emerald-600 mb-2"><?= esc($s['title']) ?></div>
                        <div class="font-medium"><?= esc($s['name']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6">
                <h2 class="text-xl font-semibold">Tenaga Pendidik</h2>
            </div>
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <table class="min-w-full text-left">
                    <thead class="bg-emerald-50">
                        <tr>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Bidang Studi</th>
                            <th class="px-4 py-3">Pendidikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tenaga ?? [] as $t): ?>
                        <tr class="border-t">
                            <td class="px-4 py-3"><?= esc($t['nama'] ?? '') ?></td>
                            <td class="px-4 py-3"><?= esc($t['bidang'] ?? '') ?></td>
                            <td class="px-4 py-3"><?= esc($t['pendidikan'] ?? '') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6">
                <h2 class="text-xl font-semibold">Fasilitas</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <?php foreach ($fasilitas ?? [] as $f): ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow">
                        <img src="<?= esc($f['image'] ?? '') ?>" alt="<?= esc($f['title'] ?? '') ?>" class="w-full h-40 object-cover" />
                        <div class="p-4">
                            <div class="font-semibold"><?= esc($f['title'] ?? '') ?></div>
                            <div class="text-sm text-gray-600"><?= esc($f['excerpt'] ?? '') ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
