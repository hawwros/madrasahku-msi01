<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroModel extends Model
{
    protected $table            = 'hero';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'judul', 'subtitle', 'gambar', 'teks_tombol', 'link_tombol', 'urutan', 'is_aktif'
    ];

    protected $validationRules = [
        'judul' => 'required|max_length[255]',
    ];

    /**
     * Ambil semua slide yang aktif, urut berdasarkan kolom urutan
     */
    public function getAktif(): array
    {
        return $this->where('is_aktif', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    /**
     * Ambil semua slide (untuk admin)
     */
    public function getAll(): array
    {
        return $this->orderBy('urutan', 'ASC')->findAll();
    }
}