<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table            = 'kontak_pesan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'nama', 'email', 'telepon', 'subjek', 'pesan',
        'status', 'dibuat_pada', 'dibaca_pada',
    ];

    /**
     * Jumlah pesan yang belum dibaca — dipakai untuk badge notifikasi di sidebar admin
     */
    public function jumlahBelumDibaca(): int
    {
        return $this->where('status', 'belum_dibaca')->countAllResults();
    }
}