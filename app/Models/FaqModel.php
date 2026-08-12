<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table            = 'faq';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'pertanyaan', 'jawaban', 'urutan', 'is_aktif'
    ];

    public function getAktif(): array
    {
        return $this->where('is_aktif', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}