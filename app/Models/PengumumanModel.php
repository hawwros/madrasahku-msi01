<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'judul', 'konten', 'kategori', 'is_penting', 'is_aktif'
    ];

    protected $validationRules = [
        'judul'  => 'required|max_length[255]',
        'konten' => 'required',
    ];

    /**
     * Ambil pengumuman untuk ditampilkan di beranda (terbaru, aktif)
     */
    public function getForBeranda(int $limit = 3): array
    {
        return $this->where('is_aktif', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll($limit);
    }

    /**
     * Ambil pengumuman penting yang aktif
     */
    public function getPenting(): array
    {
        return $this->where('is_aktif', 1)
                    ->where('is_penting', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Ambil pengumuman biasa (tidak penting) yang aktif
     */
    public function getLainnya(): array
    {
        return $this->where('is_aktif', 1)
                    ->where('is_penting', 0)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Ambil semua pengumuman aktif (untuk halaman pengumuman)
     */
    public function getAllAktif(): array
    {
        return $this->where('is_aktif', 1)
                    ->orderBy('is_penting', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Ambil semua untuk admin
     */
    public function getAllAdmin(): array
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}