<?= $this->extend('layout/mainform') ?>
<?= $this->section('content') ?>

<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">

        <!-- Header Formulir -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4 gap-3">
                <a href="<?= base_url('spmbm') ?>" class="inline-flex items-center gap-1 text-emerald-600 text-sm font-semibold hover:text-emerald-700 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
                </a>
                <div class="text-sm text-gray-500"><?= esc($settings['nama_madrasah'] ?? 'MI Salafiyah 1 Kauman Pekalongan') ?></div>
            </div>
            <div class="text-center py-4">
                <h1 class="text-2xl md:text-3xl font-bold text-emerald-700">Formulir Pendaftaran SPMBM</h1>
                <p class="text-gray-500 mt-2">Tahun Pelajaran 2026/2027</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-center text-sm text-gray-600 mt-6" id="stepIndicator">
                <div class="rounded-lg bg-emerald-600 text-white py-3 font-semibold step-indicator" data-step="step-siswa">1. Data Siswa</div>
                <div class="rounded-lg bg-gray-50 py-3 step-indicator" data-step="step-parent">2. Data Orang Tua</div>
                <div class="rounded-lg bg-gray-50 py-3 step-indicator" data-step="step-lampiran">3. Lampiran</div>
            </div>
        </div>

        <form method="post" action="<?= base_url('spmbm/submit') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Step 1: Data Siswa -->
            <section class="bg-white rounded-xl shadow-sm p-8 mb-6 step-card" id="step-siswa">
                <div class="flex items-center justify-between mb-6 gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-wider text-emerald-600 font-semibold mb-1">Langkah 1 dari 3</div>
                        <h2 class="text-xl font-bold text-gray-900">Data Siswa</h2>
                    </div>
                    <div class="bg-emerald-100 p-3 rounded-lg">
                        <i data-lucide="user" class="w-6 h-6 text-emerald-600"></i>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                        <input type="text" name="nama_lengkap" value="<?= esc(old('nama_lengkap')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Panggilan *</label>
                        <input type="text" name="nama_panggilan" value="<?= esc(old('nama_panggilan')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" required>
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['jenis_kelamin'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('jenis_kelamin') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                        <input type="text" name="nik" value="<?= esc(old('nik')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= esc(old('tempat_lahir')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?= esc(old('tanggal_lahir')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Agama</label>
                        <select name="agama" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['agama'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('agama') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Warga Negara</label>
                        <input type="text" name="warga_negara" value="<?= esc(old('warga_negara')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pernah PAUD</label>
                        <select name="pernah_paud" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['ya_tidak'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('pernah_paud') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pernah TK</label>
                        <select name="pernah_tk" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['ya_tidak'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('pernah_tk') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hobi</label>
                        <input type="text" name="hobi" value="<?= esc(old('hobi')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cita-cita</label>
                        <input type="text" name="cita_cita" value="<?= esc(old('cita_cita')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Anak ke</label>
                        <input type="number" name="anak_ke" value="<?= esc(old('anak_ke')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Saudara</label>
                        <input type="number" name="jumlah_saudara" value="<?= esc(old('jumlah_saudara')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tinggi Badan (cm)</label>
                        <input type="number" name="tinggi_badan" value="<?= esc(old('tinggi_badan')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Berat Badan (kg)</label>
                        <input type="number" name="berat_badan" value="<?= esc(old('berat_badan')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lingkar Kepala (cm)</label>
                        <input type="number" name="lingkar_kepala" value="<?= esc(old('lingkar_kepala')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No KK</label>
                        <input type="text" name="no_kk" value="<?= esc(old('no_kk')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                </div>

                <div class="text-right mt-8">
                    <button type="button" data-step-next="#step-parent"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all">
                        Lanjut ke Data Orang Tua
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </section>

            <!-- Step 2: Data Orang Tua -->
            <section class="bg-white rounded-xl shadow-sm p-8 mb-6 hidden step-card" id="step-parent">
                <div class="flex items-center justify-between mb-6 gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-wider text-emerald-600 font-semibold mb-1">Langkah 2 dari 3</div>
                        <h2 class="text-xl font-bold text-gray-900">Data Orang Tua</h2>
                    </div>
                    <div class="bg-emerald-100 p-3 rounded-lg">
                        <i data-lucide="users" class="w-6 h-6 text-emerald-600"></i>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ayah Kandung</label>
                        <input type="text" name="nama_ayah" value="<?= esc(old('nama_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir Ayah</label>
                        <input type="text" name="tempat_lahir_ayah" value="<?= esc(old('tempat_lahir_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir Ayah</label>
                        <input type="date" name="tanggal_lahir_ayah" value="<?= esc(old('tanggal_lahir_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Terakhir Ayah</label>
                        <input type="text" name="pendidikan_ayah" value="<?= esc(old('pendidikan_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" value="<?= esc(old('pekerjaan_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP Ayah</label>
                        <input type="text" name="hp_ayah" value="<?= esc(old('hp_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Penghasilan Perbulan Ayah</label>
                        <input type="text" name="penghasilan_ayah" value="<?= esc(old('penghasilan_ayah')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ibu Kandung</label>
                        <input type="text" name="nama_ibu" value="<?= esc(old('nama_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir Ibu</label>
                        <input type="text" name="tempat_lahir_ibu" value="<?= esc(old('tempat_lahir_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir Ibu</label>
                        <input type="date" name="tanggal_lahir_ibu" value="<?= esc(old('tanggal_lahir_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Terakhir Ibu</label>
                        <input type="text" name="pendidikan_ibu" value="<?= esc(old('pendidikan_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" value="<?= esc(old('pekerjaan_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP Ibu</label>
                        <input type="text" name="hp_ibu" value="<?= esc(old('hp_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Penghasilan Perbulan Ibu</label>
                        <input type="text" name="penghasilan_ibu" value="<?= esc(old('penghasilan_ibu')) ?>"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button" data-step-back="#step-siswa"
                            class="inline-flex items-center gap-2 bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Kembali
                    </button>
                    <button type="button" data-step-next="#step-lampiran"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all">
                        Lanjut ke Lampiran
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </section>

            <!-- Step 3: Lampiran & Persyaratan -->
            <section class="bg-white rounded-xl shadow-sm p-8 mb-6 hidden step-card" id="step-lampiran">
                <div class="flex items-center justify-between mb-6 gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-wider text-emerald-600 font-semibold mb-1">Langkah 3 dari 3</div>
                        <h2 class="text-xl font-bold text-gray-900">Lampiran & Persyaratan</h2>
                    </div>
                    <div class="bg-emerald-100 p-3 rounded-lg">
                        <i data-lucide="paperclip" class="w-6 h-6 text-emerald-600"></i>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kartu Keluarga</label>
                        <input type="file" name="kk_file"
                               class="w-full text-sm text-gray-600 border border-gray-200 rounded-lg px-4 py-2.5 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-emerald-50 file:text-emerald-700 file:text-sm file:font-medium hover:file:bg-emerald-100" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Akta Kelahiran</label>
                        <input type="file" name="akta_file"
                               class="w-full text-sm text-gray-600 border border-gray-200 rounded-lg px-4 py-2.5 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-emerald-50 file:text-emerald-700 file:text-sm file:font-medium hover:file:bg-emerald-100" />
                    </div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 text-sm text-gray-700">
                        <p class="font-semibold text-amber-900 mb-2">Keterangan:</p>
                        <ul class="space-y-1">
                            <li class="flex items-start gap-2">
                                <i data-lucide="dot" class="w-4 h-4 text-amber-600 flex-shrink-0 mt-0.5"></i>
                                <span>Nama anak sesuai dengan Akta Kelahiran.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="dot" class="w-4 h-4 text-amber-600 flex-shrink-0 mt-0.5"></i>
                                <span>Harap melampirkan KK dan Akta Kelahiran 1 lembar.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4 text-sm text-gray-700">
                        <p class="font-semibold text-emerald-900 mb-2">Informasi Penting:</p>
                        <ul class="space-y-1">
                            <li class="flex items-start gap-2">
                                <i data-lucide="dot" class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                                <span>Setelah mengisi formulir online, cetak dan serahkan berkas ke madrasah.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="dot" class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                                <span>Pastikan data lengkap dan sesuai dokumen resmi.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button" data-step-back="#step-parent"
                            class="inline-flex items-center gap-2 bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Kembali
                    </button>
                    <button type="submit"
                            class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all">
                        Kirim Pendaftaran
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </button>
                </div>
            </section>
        </form>
    </div>
</div>

<!-- Script navigasi step formulir -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stepCards      = document.querySelectorAll('.step-card');
    const stepIndicators = document.querySelectorAll('.step-indicator');

    function showStep(targetId) {
        // Tampilkan card yang sesuai, sembunyikan yang lain
        stepCards.forEach(function (card) {
            card.classList.toggle('hidden', card.id !== targetId);
        });

        // Update tampilan step indicator di atas (hijau = aktif, abu = belum)
        stepIndicators.forEach(function (indicator) {
            const isActive = indicator.dataset.step === targetId;
            indicator.classList.toggle('bg-emerald-600', isActive);
            indicator.classList.toggle('text-white', isActive);
            indicator.classList.toggle('font-semibold', isActive);
            indicator.classList.toggle('bg-gray-50', !isActive);
        });

        // Scroll halus ke atas form supaya pengguna melihat step baru
        document.getElementById('stepIndicator')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Tombol "Lanjut ke ..."
    document.querySelectorAll('[data-step-next]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const targetId = this.dataset.stepNext.replace('#', '');
            showStep(targetId);
        });
    });

    // Tombol "Kembali"
    document.querySelectorAll('[data-step-back]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const targetId = this.dataset.stepBack.replace('#', '');
            showStep(targetId);
        });
    });
});
</script>

<?= $this->endSection() ?>