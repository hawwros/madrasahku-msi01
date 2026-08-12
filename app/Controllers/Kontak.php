<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\KontakModel;   // <-- pastikan baris ini ada

class Kontak extends BaseController
{
    protected KontakModel $kontakModel;
    protected HomeModel $homeModel;

    public function __construct()
    {
        $this->kontakModel = new KontakModel();
        $this->homeModel    = new HomeModel();
    }

    /**
     * Halaman kontak publik (form + info kontak)
     */
    // public function index()
    // {
    //     return view('kontak/index', [
    //         'page_title' => 'Kontak',
    //     ]);
    // }

    public function index(): string
    {
        $data = [
            'page_title' => 'Kontak',
            'settings'   => $this->homeModel->getSettings(),
        ];

        return view('kontak/index', $data);
    }

    /**
     * Proses submit form kontak dari pengunjung website.
     * Pesan langsung tersimpan dan bisa dilihat admin di panel admin.
     */
    public function kirim()
    {
        $rules = [
            'nama'    => 'required|min_length[3]|max_length[150]',
            'email'   => 'required|valid_email|max_length[150]',
            'telepon' => 'permit_empty|max_length[20]',
            'subjek'  => 'required|max_length[200]',
            'pesan'   => 'required|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kontakModel->insert([
            'nama'        => $this->request->getPost('nama'),
            'email'       => $this->request->getPost('email'),
            'telepon'     => $this->request->getPost('telepon'),
            'subjek'      => $this->request->getPost('subjek'),
            'pesan'       => $this->request->getPost('pesan'),
            'status'      => 'belum_dibaca',
            'dibuat_pada' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('/kontak'))
            ->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}