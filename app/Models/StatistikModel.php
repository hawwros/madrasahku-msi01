<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistikModel extends Model
{
    protected $table            = 'statistik';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'label', 'angka', 'ikon', 'warna', 'urutan'
    ];

    public function getAll(): array
    {
        return $this->orderBy('urutan', 'ASC')->findAll();
    }
}