<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table            = 'prestasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'juara', 'lomba', 'tahun', 'tingkat', 'ikon', 'is_featured', 'is_aktif'
    ];

    public function getFeatured(): array
    {
        return $this->where('is_aktif', 1)
                    ->where('is_featured', 1)
                    ->orderBy('tahun', 'DESC')
                    ->findAll();
    }

    public function getAllAktif(): array
    {
        return $this->where('is_aktif', 1)
                    ->orderBy('tahun', 'DESC')
                    ->findAll();
    }

    public function getAllAdmin(): array
    {
        return $this->orderBy('tahun', 'DESC')->findAll();
    }
}