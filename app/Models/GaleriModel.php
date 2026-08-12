<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table            = 'galeri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $createdField     = 'created_at';

    protected $allowedFields = [
        'judul', 'gambar', 'kategori', 'is_aktif'
    ];

    public function getAktif(?string $kategori = null): array
    {
        $builder = $this->where('is_aktif', 1);
        if ($kategori) {
            $builder = $builder->where('kategori', $kategori);
        }
        return $builder->orderBy('created_at', 'DESC')->findAll();
    }

    public function getAllAdmin(): array
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}