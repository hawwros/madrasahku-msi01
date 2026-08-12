<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\ProfilModel;
use App\Models\PrestasiModel;

class Profil extends BaseController
{
    protected $homeModel;
    protected $profilModel;
    protected $prestasiModel;

    public function __construct()
    {
        $this->homeModel    = new HomeModel();
        $this->profilModel  = new ProfilModel();
        $this->prestasiModel = new PrestasiModel();
    }

    public function index(): string
    {
        $data = [
            'page_title'         => 'Profil Madrasah',
            'settings'           => $this->homeModel->getSettings(),
            'strukturOrganisasi' => $this->profilModel->getStrukturOrganisasi(),
            'tenagaPendidik'     => $this->profilModel->getTenagaPendidik(),
            'fasilitas'          => $this->profilModel->getFasilitas(),
            'misiList'           => $this->profilModel->getMisi(),
            'prestasi'           => $this->profilModel->getPrestasiHighlight(),
        ];

        return view('profil/index', $data);
    }
}