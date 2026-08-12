<?php

namespace App\Controllers;

use App\Models\HeroModel;
use App\Models\StatistikModel;
use App\Models\PengumumanModel;
use App\Models\TestimoniModel;
use App\Models\HomeModel;

class Home extends BaseController
{
    protected $homeModel;
    protected $heroModel;
    protected $statistikModel;
    protected $pengumumanModel;
    protected $testimoniModel;

    public function __construct()
    {
        $this->homeModel      = new HomeModel();
        $this->heroModel      = new HeroModel();
        $this->statistikModel = new StatistikModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->testimoniModel  = new TestimoniModel();
    }

    public function index(): string
    {
        $data = [
            'page_title' => 'Beranda',
            'settings'   => $this->homeModel->getSettings(),
            'hero'       => $this->heroModel->getAktif(),
            'statistik'  => $this->statistikModel->getAll(),
            'pengumuman' => $this->pengumumanModel->getForBeranda(3),
            'testimoni'  => $this->testimoniModel->getAktif(),
            'spmbInfo'   => $this->homeModel->getSpmbInfo(),
        ];

        return view('home/index', $data);
    }
}