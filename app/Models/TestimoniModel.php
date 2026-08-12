<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table            = 'testimoni';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'nama', 'role', 'foto', 'testimoni', 'rating', 'is_aktif', 'urutan'
    ];

    public function getAktif(): array
    {
        return $this->where('is_aktif', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    public function getAllAdmin(): array
    {
        return $this->orderBy('urutan', 'ASC')->findAll();
    }
}