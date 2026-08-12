<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\ProgramModel;

class Akademik extends BaseController
{
    protected $homeModel;
    protected $programModel;

    public function __construct()
    {
        $this->homeModel    = new HomeModel();
        $this->programModel = new ProgramModel();
    }

    public function index(): string
    {
        // Ambil kalender akademik
        $db = \Config\Database::connect();
        $kalender = $db->table('kalender_akademik')
                       ->where('is_aktif', 1)
                       ->orderBy('tanggal_mulai', 'ASC')
                       ->get()->getResultArray();

        // Jadwal KBM statis bisa dikonfigurasi dari settings
        $kegiatanBelajar = [
            ['hari' => 'Senin - Kamis', 'waktu' => '07:00 - 15:00', 'kegiatan' => 'Pembelajaran Reguler (Kurikulum Nasional & Madrasah)'],
            ['hari' => 'Jumat',         'waktu' => 'Libur',          'kegiatan' => 'Tidak ada kegiatan pembelajaran'],
            ['hari' => 'Sabtu - Minggu','waktu' => '07:00 - 15:00', 'kegiatan' => 'Pembelajaran Reguler & Ekstrakurikuler'],
        ];

        $data = [
            'page_title'     => 'Akademik',
            'settings'       => $this->homeModel->getSettings(),
            'program'        => $this->programModel->getAktif(),
            'kalender'       => $kalender,
            'kegiatanBelajar'=> $kegiatanBelajar,
        ];

        return view('akademik/index', $data);
    }
}