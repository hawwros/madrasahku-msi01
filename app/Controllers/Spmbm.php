<?php

namespace App\Controllers;

use App\Models\SpmbmModel;
use App\Models\HomeModel;
use CodeIgniter\Controller;

class Spmbm extends Controller
{
    protected SpmbmModel $spmbmModel;
    protected HomeModel $homeModel;

    public function __construct()
    {
        $this->spmbmModel = new SpmbmModel();
        $this->homeModel    = new HomeModel();
    }

    /**
     * Halaman informasi SPMBM (alur, syarat, jadwal, biaya)
     */
    public function index()
    {
        $data = [
            'page_title'   => 'SPMBM',
            'settings'     => $this->homeModel->getSettings(),
            'spmbm'        => [
                'title'    => 'Sistem Penerimaan Murid Baru Madrasah',
                'subtitle' => 'Daftarkan putra-putri Anda — kuota terbatas, tahun pelajaran 2026/2027.',
                'cta'      => 'Daftar Sekarang',
                'cta_link' => base_url('spmbm/form'),
            ],
            'requirements' => [
                ['text' => 'Fotokopi Kartu Keluarga (KK)'],
                ['text' => 'Fotokopi Akta Kelahiran'],
                ['text' => 'Pas foto berwarna 3x4 (2 lembar)'],
                ['text' => 'Usia minimal 6 tahun pada saat tahun ajaran dimulai'],
            ],
            'timeline' => [
                ['tanggal' => '1 - 31 Januari 2026', 'kegiatan' => 'Pendaftaran Gelombang 1'],
                ['tanggal' => '5 Februari 2026',      'kegiatan' => 'Tes Seleksi'],
                ['tanggal' => '15 Februari 2026',     'kegiatan' => 'Pengumuman Hasil Seleksi'],
                ['tanggal' => '1 - 15 Maret 2026',    'kegiatan' => 'Daftar Ulang'],
            ],
            'fees' => [
                ['label' => 'Biaya Pendaftaran', 'amount' => 150000],
                ['label' => 'Seragam & Perlengkapan', 'amount' => 750000],
                ['label' => 'Uang Gedung', 'amount' => 2000000],
            ],
        ];

        return view('spmbm/index', $data);
    }

    /**
     * Halaman formulir pendaftaran (multi-step)
     */
    public function form()
    {
        $data = [
            'page_title'  => 'Formulir Pendaftaran SPMBM',
            'formOptions' => [
                'jenis_kelamin' => [
                    ['value' => 'L', 'label' => 'Laki-laki'],
                    ['value' => 'P', 'label' => 'Perempuan'],
                ],
                'agama' => [
                    ['value' => 'Islam',     'label' => 'Islam'],
                    ['value' => 'Kristen',   'label' => 'Kristen'],
                    ['value' => 'Katolik',   'label' => 'Katolik'],
                    ['value' => 'Hindu',     'label' => 'Hindu'],
                    ['value' => 'Buddha',    'label' => 'Buddha'],
                    ['value' => 'Konghucu',  'label' => 'Konghucu'],
                ],
                'ya_tidak' => [
                    ['value' => 'Ya',    'label' => 'Ya'],
                    ['value' => 'Tidak', 'label' => 'Tidak'],
                ],
            ],
        ];

        return view('spmbm/form', $data);
    }

    /**
     * Proses submit formulir pendaftaran
     */
    public function submit()
    {
        $rules = [
            'nama_lengkap'   => 'required|min_length[3]|max_length[150]',
            'nama_panggilan' => 'required|max_length[50]',
            'jenis_kelamin'  => 'required|in_list[L,P]',
            'nik'            => 'permit_empty|numeric|max_length[16]',
            'tempat_lahir'   => 'permit_empty|max_length[100]',
            'tanggal_lahir'  => 'permit_empty|valid_date',
            'agama'          => 'permit_empty|max_length[50]',
            'warga_negara'   => 'permit_empty|max_length[50]',
            'pernah_paud'    => 'permit_empty|in_list[Ya,Tidak]',
            'pernah_tk'      => 'permit_empty|in_list[Ya,Tidak]',
            'hobi'           => 'permit_empty|max_length[100]',
            'cita_cita'      => 'permit_empty|max_length[100]',
            'anak_ke'        => 'permit_empty|integer',
            'jumlah_saudara' => 'permit_empty|integer',
            'tinggi_badan'   => 'permit_empty|decimal',
            'berat_badan'    => 'permit_empty|decimal',
            'lingkar_kepala' => 'permit_empty|decimal',
            'no_kk'          => 'permit_empty|max_length[20]',

            'nama_ayah'         => 'permit_empty|max_length[150]',
            'tempat_lahir_ayah' => 'permit_empty|max_length[100]',
            'tanggal_lahir_ayah' => 'permit_empty|valid_date',
            'pendidikan_ayah'   => 'permit_empty|max_length[100]',
            'pekerjaan_ayah'    => 'permit_empty|max_length[100]',
            'hp_ayah'           => 'permit_empty|max_length[20]',
            'penghasilan_ayah'  => 'permit_empty|max_length[100]',

            'nama_ibu'         => 'permit_empty|max_length[150]',
            'tempat_lahir_ibu' => 'permit_empty|max_length[100]',
            'tanggal_lahir_ibu' => 'permit_empty|valid_date',
            'pendidikan_ibu'   => 'permit_empty|max_length[100]',
            'pekerjaan_ibu'    => 'permit_empty|max_length[100]',
            'hp_ibu'           => 'permit_empty|max_length[20]',
            'penghasilan_ibu'  => 'permit_empty|max_length[100]',

            'kk_file'   => 'permit_empty|max_size[kk_file,2048]|ext_in[kk_file,pdf,jpg,jpeg,png]',
            'akta_file' => 'permit_empty|max_size[akta_file,2048]|ext_in[akta_file,pdf,jpg,jpeg,png]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost([
            'nama_lengkap', 'nama_panggilan', 'jenis_kelamin', 'nik', 'tempat_lahir',
            'tanggal_lahir', 'agama', 'warga_negara', 'pernah_paud', 'pernah_tk',
            'hobi', 'cita_cita', 'anak_ke', 'jumlah_saudara', 'tinggi_badan',
            'berat_badan', 'lingkar_kepala', 'no_kk',
            'nama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'pendidikan_ayah',
            'pekerjaan_ayah', 'hp_ayah', 'penghasilan_ayah',
            'nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'pendidikan_ibu',
            'pekerjaan_ibu', 'hp_ibu', 'penghasilan_ibu',
        ]);

        // Upload berkas Kartu Keluarga
        $kkFile = $this->request->getFile('kk_file');
        if ($kkFile && $kkFile->isValid() && ! $kkFile->hasMoved()) {
            $kkName = $kkFile->getRandomName();
            $kkFile->move(WRITEPATH . 'uploads/spmbm', $kkName);
            $postData['kk_file'] = $kkName;
        }

        // Upload berkas Akta Kelahiran
        $aktaFile = $this->request->getFile('akta_file');
        if ($aktaFile && $aktaFile->isValid() && ! $aktaFile->hasMoved()) {
            $aktaName = $aktaFile->getRandomName();
            $aktaFile->move(WRITEPATH . 'uploads/spmbm', $aktaName);
            $postData['akta_file'] = $aktaName;
        }

        $postData['status']       = 'baru';
        $postData['dibuat_pada']  = date('Y-m-d H:i:s');

        $this->spmbmModel->insert($postData);

        return redirect()->to(base_url('spmbm'))
            ->with('spmbm_success', 'Pendaftaran berhasil dikirim. Silakan cetak formulir dan serahkan berkas ke madrasah.');
    }
}