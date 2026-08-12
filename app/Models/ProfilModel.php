<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'settings';

    /**
     * Ambil data struktur organisasi
     */
    public function getStrukturOrganisasi(): array
    {
        return $this->db->table('struktur_organisasi')
                        ->where('is_aktif', 1)
                        ->orderBy('urutan', 'ASC')
                        ->get()->getResultArray();
    }

    /**
     * Ambil tenaga pendidik
     */
    public function getTenagaPendidik(): array
    {
        return $this->db->table('tenaga_pendidik')
                        ->where('is_aktif', 1)
                        ->orderBy('urutan', 'ASC')
                        ->get()->getResultArray();
    }

    /**
     * Ambil fasilitas
     */
    public function getFasilitas(): array
    {
        return $this->db->table('fasilitas')
                        ->where('is_aktif', 1)
                        ->orderBy('urutan', 'ASC')
                        ->get()->getResultArray();
    }

    /**
     * Ambil poin-poin misi
     */
    public function getMisi(): array
    {
        return $this->db->table('misi')
                        ->where('is_aktif', 1)
                        ->orderBy('urutan', 'ASC')
                        ->get()->getResultArray();
    }

    /**
     * Ambil prestasi featured
     */
    public function getPrestasiHighlight(): array
    {
        return $this->db->table('prestasi')
                        ->where('is_aktif', 1)
                        ->where('is_featured', 1)
                        ->orderBy('tahun', 'DESC')
                        ->get()->getResultArray();
    }
}