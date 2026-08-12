<div>
    <section class="relative h-40 bg-emerald-600 text-white flex items-center">
        <div class="container mx-auto px-4">
            <div class="py-6">
                <div class="inline-block px-3 py-1 bg-amber-500 rounded-full mb-2 text-sm">Hubungi Kami</div>
                <h1 class="text-2xl font-bold">Kontak Madrasahku</h1>
                <p class="opacity-90 mt-2">Kami siap membantu menjawab pertanyaan dan memberikan informasi yang Anda butuhkan.</p>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Alamat</h4>
                    <p class="text-gray-600"><?= nl2br(esc($contact['alamat'] ?? 'Alamat belum disetel.')) ?></p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Telepon</h4>
                    <p class="text-gray-600"><?= esc($contact['telepon'] ?? '-') ?></p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Whatsapp</h4>
                    <p class="text-gray-600"><?= esc($contact['whatsapp'] ?? '-') ?></p>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Email</h4>
                    <p class="text-gray-600"><?= esc($contact['email'] ?? '-') ?></p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Jam Operasional</h4>
                    <p class="text-gray-600"><?= nl2br(esc($contact['jam_operasional'] ?? '')) ?></p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Lokasi Madrasah</h4>
                    <div class="bg-emerald-50 h-40 rounded flex items-center justify-center text-sm text-gray-500">
                        <?= esc($contact['lokasi'] ?? 'Peta lokasi belum tersedia.') ?>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow mt-8">
                <h4 class="font-semibold mb-3">Pertanyaan Umum</h4>
                <button type="button" class="accordion-trigger w-full text-left py-3 border-b border-emerald-100 font-semibold" aria-expanded="false">Bagaimana cara mendaftar?</button>
                <div class="accordion-panel hidden overflow-hidden transition-all duration-300">
                    <p class="py-3 text-gray-600">Silakan isi formulir pendaftaran di halaman SPMBM, lalu cetak bukti pendaftaran dan serahkan dokumen ke kantor madrasah.</p>
                </div>
                <button type="button" class="accordion-trigger w-full text-left py-3 border-b border-emerald-100 font-semibold" aria-expanded="false">Apa syarat administrasi?</button>
                <div class="accordion-panel hidden overflow-hidden transition-all duration-300">
                    <p class="py-3 text-gray-600">Siapkan KK, Akta Kelahiran, dan raport terakhir (jika ada). Dokumen pendukung lain seperti kartu bantuan juga membantu.</p>
                </div>
                <button type="button" class="accordion-trigger w-full text-left py-3 border-b border-emerald-100 font-semibold" aria-expanded="false">Bagaimana jika ada pertanyaan?</button>
                <div class="accordion-panel hidden overflow-hidden transition-all duration-300">
                    <p class="py-3 text-gray-600">Gunakan formulir kontak atau hubungi WhatsApp resmi madrasah untuk bantuan cepat.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mt-8">
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Formulir Kontak</h4>
                    <?php if (session()->getFlashdata('contact_success')): ?>
                        <div class="mb-4 rounded-lg bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
                            <?= esc(session()->getFlashdata('contact_success')) ?>
                        </div>
                    <?php elseif (session()->getFlashdata('contact_error')): ?>
                        <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4 text-red-700">
                            <?= esc(session()->getFlashdata('contact_error')) ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url('kontak/submit') ?>">
                        <div class="mb-3">
                            <label class="block text-sm mb-1">Nama lengkap</label>
                            <input name="nama" value="<?= esc(old('nama')) ?>" class="w-full border rounded px-3 py-2" required />
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm mb-1">Email</label>
                            <input name="email" type="email" value="<?= esc(old('email')) ?>" class="w-full border rounded px-3 py-2" required />
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm mb-1">Pesan</label>
                            <textarea name="pesan" class="w-full border rounded px-3 py-2" rows="4" required><?= esc(old('pesan')) ?></textarea>
                        </div>
                        <button class="bg-emerald-600 text-white px-4 py-2 rounded">Kirim Pesan</button>
                    </form>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <h4 class="font-semibold mb-3">Jam Layanan Administratif</h4>
                    <div class="text-gray-600"><?= nl2br(esc($contact['jam_operasional'] ?? '')) ?></div>
                    <div class="mt-4">
                        <h5 class="font-semibold">Layanan Darurat</h5>
                        <p class="text-gray-600">Whatsapp: <?= esc($contact['whatsapp'] ?? '-') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
