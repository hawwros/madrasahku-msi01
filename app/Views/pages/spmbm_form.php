<div class="py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-2xl p-6 shadow mb-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4 gap-3">
                <a href="<?= base_url('spmbm') ?>" class="text-emerald-600 text-sm font-semibold">&larr; Kembali</a>
                <div class="text-sm text-slate-500">MI Salafiyah 1 Kauman Pekalongan</div>
            </div>
            <div class="text-center py-6">
                <h1 class="text-3xl font-bold text-emerald-700">Formulir Pendaftaran SPMBM</h1>
                <p class="text-slate-500 mt-2">Tahun Pelajaran 2026/2027</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 text-center text-sm text-slate-600 mt-6">
                <div class="rounded-2xl bg-emerald-50 py-3 font-semibold text-emerald-700">Data Siswa</div>
                <div class="rounded-2xl bg-slate-50 py-3">Data Ayah</div>
                <div class="rounded-2xl bg-slate-50 py-3">Data Ibu</div>
                <div class="rounded-2xl bg-slate-50 py-3">Data Tambahan</div>
                <div class="rounded-2xl bg-slate-50 py-3">Lampiran</div>
            </div>
        </div>

        <form method="post" action="<?= base_url('spmbm/submit') ?>" enctype="multipart/form-data">
            <div class="bg-white rounded-2xl p-6 shadow mb-6 step-card" id="step-siswa">
                <div class="flex items-center justify-between mb-4 gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-widest text-emerald-600">Langkah 1 dari 3</div>
                        <h2 class="font-semibold text-2xl">Data Siswa</h2>
                    </div>
                    <div class="rounded-full bg-emerald-100 text-emerald-700 px-4 py-2 text-sm">SPMBM</div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1">Nama Lengkap *</label>
                        <input type="text" name="nama_lengkap" value="<?= esc(old('nama_lengkap')) ?>" class="w-full px-3 py-2 border rounded" required />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Nama Panggilan *</label>
                        <input type="text" name="nama_panggilan" value="<?= esc(old('nama_panggilan')) ?>" class="w-full px-3 py-2 border rounded" required />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="w-full px-3 py-2 border rounded" required>
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['jenis_kelamin'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('jenis_kelamin') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">NIK</label>
                        <input type="text" name="nik" value="<?= esc(old('nik')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= esc(old('tempat_lahir')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?= esc(old('tanggal_lahir')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Agama</label>
                        <select name="agama" class="w-full px-3 py-2 border rounded">
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['agama'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('agama') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Warga Negara</label>
                        <input type="text" name="warga_negara" value="<?= esc(old('warga_negara')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Pernah PAUD</label>
                        <select name="pernah_paud" class="w-full px-3 py-2 border rounded">
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['ya_tidak'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('pernah_paud') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Pernah TK</label>
                        <select name="pernah_tk" class="w-full px-3 py-2 border rounded">
                            <option value="">Pilih..</option>
                            <?php foreach ($formOptions['ya_tidak'] ?? [] as $option): ?>
                                <option value="<?= esc($option['value']) ?>" <?= old('pernah_tk') === $option['value'] ? 'selected' : '' ?>><?= esc($option['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Hobi</label>
                        <input type="text" name="hobi" value="<?= esc(old('hobi')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Cita-cita</label>
                        <input type="text" name="cita_cita" value="<?= esc(old('cita_cita')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Anak ke</label>
                        <input type="number" name="anak_ke" value="<?= esc(old('anak_ke')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Jumlah Saudara</label>
                        <input type="number" name="jumlah_saudara" value="<?= esc(old('jumlah_saudara')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tinggi Badan (cm)</label>
                        <input type="number" name="tinggi_badan" value="<?= esc(old('tinggi_badan')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Berat Badan (kg)</label>
                        <input type="number" name="berat_badan" value="<?= esc(old('berat_badan')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Lingkar Kepala (cm)</label>
                        <input type="number" name="lingkar_kepala" value="<?= esc(old('lingkar_kepala')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">No KK</label>
                        <input type="text" name="no_kk" value="<?= esc(old('no_kk')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                </div>
                <div class="text-right mt-6">
                    <button type="button" data-step-next="#step-parent" class="btn btn-secondary px-6 py-3 rounded">Lanjut ke Data Orang Tua</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow mb-6 hidden step-card" id="step-parent">
                <div class="flex items-center justify-between mb-4 gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-widest text-emerald-600">Langkah 2 dari 3</div>
                        <h2 class="font-semibold text-2xl">Data Orang Tua</h2>
                    </div>
                    <div class="rounded-full bg-emerald-100 text-emerald-700 px-4 py-2 text-sm">Orang Tua</div>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1">Nama Ayah Kandung</label>
                        <input type="text" name="nama_ayah" value="<?= esc(old('nama_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tempat Lahir Ayah</label>
                        <input type="text" name="tempat_lahir_ayah" value="<?= esc(old('tempat_lahir_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tanggal Lahir Ayah</label>
                        <input type="date" name="tanggal_lahir_ayah" value="<?= esc(old('tanggal_lahir_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Pendidikan Terakhir Ayah</label>
                        <input type="text" name="pendidikan_ayah" value="<?= esc(old('pendidikan_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" value="<?= esc(old('pekerjaan_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Nomor HP Ayah</label>
                        <input type="text" name="hp_ayah" value="<?= esc(old('hp_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Penghasilan Perbulan Ayah</label>
                        <input type="text" name="penghasilan_ayah" value="<?= esc(old('penghasilan_ayah')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Nama Ibu Kandung</label>
                        <input type="text" name="nama_ibu" value="<?= esc(old('nama_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tempat Lahir Ibu</label>
                        <input type="text" name="tempat_lahir_ibu" value="<?= esc(old('tempat_lahir_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Tanggal Lahir Ibu</label>
                        <input type="date" name="tanggal_lahir_ibu" value="<?= esc(old('tanggal_lahir_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Pendidikan Terakhir Ibu</label>
                        <input type="text" name="pendidikan_ibu" value="<?= esc(old('pendidikan_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" value="<?= esc(old('pekerjaan_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Nomor HP Ibu</label>
                        <input type="text" name="hp_ibu" value="<?= esc(old('hp_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Penghasilan Perbulan Ibu</label>
                        <input type="text" name="penghasilan_ibu" value="<?= esc(old('penghasilan_ibu')) ?>" class="w-full px-3 py-2 border rounded" />
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="button" data-step-back="#step-siswa" class="btn btn-secondary px-6 py-3 rounded">Kembali</button>
                    <button type="button" data-step-next="#step-lampiran" class="btn btn-primary px-6 py-3 rounded">Lanjut ke Lampiran</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow mb-6 hidden step-card" id="step-lampiran">
                <div class="flex items-center justify-between mb-4 gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-widest text-emerald-600">Langkah 3 dari 3</div>
                        <h2 class="font-semibold text-2xl">Lampiran & Persyaratan</h2>
                    </div>
                    <div class="rounded-full bg-emerald-100 text-emerald-700 px-4 py-2 text-sm">Lampiran</div>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1">Kartu Keluarga</label>
                        <input type="file" name="kk_file" class="w-full" />
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Akta Kelahiran</label>
                        <input type="file" name="akta_file" class="w-full" />
                    </div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="bg-amber-50 p-4 rounded text-sm text-slate-700">
                        <p class="font-semibold mb-2">Keterangan:</p>
                        <ul class="list-disc list-inside">
                            <li>Nama anak sesuai dengan Akta Kelahiran.</li>
                            <li>Harap melampirkan KK dan Akta Kelahiran 1 lembar.</li>
                        </ul>
                    </div>
                    <div class="bg-emerald-50 p-4 rounded text-sm text-slate-700">
                        <p class="font-semibold mb-2">Informasi Penting:</p>
                        <ul class="list-disc list-inside">
                            <li>Setelah mengisi formulir online, cetak dan serahkan berkas ke madrasah.</li>
                            <li>Pastikan data lengkap dan sesuai dokumen resmi.</li>
                        </ul>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="button" data-step-back="#step-parent" class="btn btn-secondary px-6 py-3 rounded">Kembali</button>
                    <button type="submit" class="btn btn-primary px-6 py-3 rounded">Kirim Pendaftaran</button>
                </div>
            </div>
        </form>
    </div>
</div>
