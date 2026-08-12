<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- Hero -->
<section class="relative h-[400px] overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/95 via-emerald-800/85 to-teal-900/90 z-10"></div>
    <div class="w-full h-full bg-gradient-to-br from-emerald-800 to-teal-900"></div>
    <div class="absolute inset-0 z-20 flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <div class="inline-block px-4 py-2 bg-amber-500 text-white rounded-full text-sm mb-4 font-medium">Kontak</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Hubungi Kami</h1>
            <p class="text-lg md:text-xl text-emerald-50 max-w-3xl mx-auto">
                Kami siap membantu menjawab pertanyaan Anda seputar <?= esc($settings['nama_madrasah'] ?? 'Madrasahku') ?>,
                pendaftaran, maupun informasi lainnya.
            </p>
        </div>
    </div>
</section>

<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Kolom Kiri: Informasi Kontak -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Informasi Kontak -->
                <section class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i data-lucide="phone" class="w-6 h-6 text-emerald-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Informasi Kontak</h2>
                    </div>
                    <div class="space-y-5">
                        <div class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm text-gray-500 mb-0.5">Alamat</p>
                                <p class="text-gray-900 font-medium leading-relaxed"><?= esc($settings['alamat'] ?? '-') ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="phone" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm text-gray-500 mb-0.5">Telepon</p>
                                <p class="text-gray-900 font-medium"><?= esc($settings['telepon'] ?? '-') ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="mail" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm text-gray-500 mb-0.5">Email</p>
                                <p class="text-gray-900 font-medium"><?= esc($settings['email'] ?? '-') ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="clock" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm text-gray-500 mb-0.5">Jam Operasional</p>
                                <p class="text-gray-900 font-medium leading-relaxed"><?= esc($settings['jam_operasional'] ?? '-') ?></p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- WhatsApp CTA -->
                <?php if (!empty($settings['whatsapp'])): ?>
                <section class="bg-gradient-to-br from-emerald-700 to-teal-800 rounded-xl p-6 text-white">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-white/20 p-2.5 rounded-lg">
                            <i data-lucide="message-circle" class="w-5 h-5 text-white"></i>
                        </div>
                        <h3 class="font-semibold">Chat via WhatsApp</h3>
                    </div>
                    <p class="text-emerald-100 text-sm mb-4 leading-relaxed">
                        Butuh respon cepat? Hubungi kami langsung melalui WhatsApp.
                    </p>
                    <a href="https://wa.me/62<?= ltrim(preg_replace('/[^0-9]/', '', $settings['whatsapp']), '0') ?>"
                       target="_blank" rel="noopener"
                       class="block text-center bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors">
                        Kirim Pesan
                    </a>
                </section>
                <?php endif; ?>

                <!-- Sosial Media -->
                <section class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i data-lucide="share-2" class="w-6 h-6 text-emerald-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Media Sosial</h2>
                    </div>
                    <div class="flex gap-3">
                        <?php if (!empty($settings['facebook_url'])): ?>
                        <a href="<?= esc($settings['facebook_url']) ?>" target="_blank" rel="noopener"
                           class="w-11 h-11 bg-emerald-50 hover:bg-emerald-600 hover:text-white text-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['instagram_url'])): ?>
                        <a href="<?= esc($settings['instagram_url']) ?>" target="_blank" rel="noopener"
                           class="w-11 h-11 bg-emerald-50 hover:bg-emerald-600 hover:text-white text-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['youtube_url'])): ?>
                        <a href="<?= esc($settings['youtube_url']) ?>" target="_blank" rel="noopener"
                           class="w-11 h-11 bg-emerald-50 hover:bg-emerald-600 hover:text-white text-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                            <i data-lucide="youtube" class="w-5 h-5"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </section>

            </div>

            <!-- Kolom Kanan: Form & Peta -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Form Kontak -->
                <section class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i data-lucide="send" class="w-6 h-6 text-emerald-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Kirim Pesan</h2>
                    </div>

                    <?php if (session()->getFlashdata('success')): ?>
                    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg p-4 text-sm">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/kontak/kirim') ?>" method="post" class="space-y-5">
                        <?= csrf_field() ?>
                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" required
                                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                       placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                       placeholder="nama@email.com">
                            </div>
                        </div>
                        <div>
                            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" id="telepon" name="telepon"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label for="subjek" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                            <input type="text" id="subjek" name="subjek" required
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                   placeholder="Perihal pesan Anda">
                        </div>
                        <div>
                            <label for="pesan" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" required
                                      class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent resize-none"
                                      placeholder="Tuliskan pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all">
                            <span>Kirim Pesan</span>
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </form>
                </section>

                <!-- Peta Lokasi -->
                <section class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i data-lucide="map" class="w-6 h-6 text-emerald-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Lokasi Kami</h2>
                    </div>
                    <?php if (!empty($settings['maps_embed_url'])): ?>
                    <div class="rounded-lg overflow-hidden border border-gray-200">
                        <iframe src="<?= esc($settings['maps_embed_url'], 'attr') ?>"
                                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <?php else: ?>
                    <div class="bg-gray-100 rounded-lg h-[350px] flex items-center justify-center">
                        <p class="text-gray-400 italic text-sm">Peta lokasi belum tersedia.</p>
                    </div>
                    <?php endif; ?>
                </section>

            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>