<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
    protected $homeModel;
    protected $pengumumanModel;

    public function __construct()
    {
        $this->homeModel      = new HomeModel();
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index(): string
    {
        $data = [
            'page_title'       => 'Pengumuman',
            'settings'         => $this->homeModel->getSettings(),
            'pengumumanPenting' => $this->pengumumanModel->getPenting(),
            'pengumumanLainnya' => $this->pengumumanModel->getLainnya(),
        ];

        return view('pengumuman/index', $data);
    }
}