<div class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h1 class="mb-2">Pengumuman</h1>
            <p class="text-gray-600">Informasi dan pengumuman resmi dari Madrasahku.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
                <?php
                    // Group pengumuman into penting and lainnya
                    $penting = [];
                    $lain = [];
                    if (!empty($pengumuman) && is_array($pengumuman)) {
                        foreach ($pengumuman as $p) {
                            if (!empty($p['isPenting']) && (int)$p['isPenting'] === 1) {
                                $penting[] = $p;
                            } else {
                                $lain[] = $p;
                            }
                        }
                    }
                ?>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm">Pengumuman Penting</div>
                                    <h2 class="text-lg font-semibold mt-2">Pengumuman Terbaru & Penting</h2>
                                </div>
                            </div>

                            <?php if (!empty($penting)): foreach ($penting as $p): ?>
                                <div class="border-l-4 border-red-400 bg-white rounded-lg p-4 mb-4 shadow-sm">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="text-sm text-gray-500 mb-1"><?= date('d M Y', strtotime($p['tanggal'] ?? date('Y-m-d'))) ?></div>
                                            <div class="inline-block px-2 py-1 bg-red-50 text-red-700 rounded text-xs mb-2"><?= esc($p['kategori'] ?? 'Penting') ?></div>
                                            <h3 class="font-semibold mb-2 text-gray-800"><?= esc($p['judul']) ?></h3>
                                            <p class="text-gray-600"><?= esc($p['konten'] ?? '') ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; else: ?>
                                <div class="text-gray-500">Tidak ada pengumuman penting saat ini.</div>
                            <?php endif; ?>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm">Pengumuman Lainnya</div>
                                    <h2 class="text-lg font-semibold mt-2">Pengumuman Lainnya</h2>
                                </div>
                                <div class="text-sm text-gray-500">Total: <?= count($lain) ?></div>
                            </div>

                            <?php if (!empty($lain)): foreach ($lain as $p): ?>
                                <div class="bg-white rounded-lg p-4 mb-3 shadow-sm">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="text-sm text-gray-500 mb-1"><?= date('d M Y', strtotime($p['tanggal'] ?? date('Y-m-d'))) ?></div>
                                            <div class="inline-block px-2 py-1 bg-emerald-50 text-emerald-700 rounded text-xs mb-2"><?= esc($p['kategori'] ?? 'Umum') ?></div>
                                            <h3 class="font-semibold mb-1"><?= esc($p['judul']) ?></h3>
                                            <p class="text-gray-600 text-sm"><?= esc($p['konten'] ?? '') ?></p>
                                        </div>
                                        <div class="text-sm text-gray-400">&nbsp;</div>
                                    </div>
                                </div>
                            <?php endforeach; else: ?>
                                <div class="text-gray-500">Belum ada pengumuman lainnya.</div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <aside class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="mb-4">
                            <h4 class="font-semibold">Filter</h4>
                            <div class="mt-2 space-y-2 text-sm">
                                <div><label><input type="checkbox" checked disabled> Tampilkan penting</label></div>
                                <div><label><input type="checkbox" checked disabled> Semua kategori</label></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold">Info</h4>
                            <p class="text-sm text-gray-600 mt-2">Pengumuman resmi dari madrasah untuk seluruh civitas, orang tua, dan stakeholder.</p>
                        </div>
                    </aside>
                </div>
        </div>
    </div>
</div>
