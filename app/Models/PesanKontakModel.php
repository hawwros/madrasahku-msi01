<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanKontakModel extends Model
{
    protected $table            = 'pesan_kontak';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'nama', 'email', 'telepon', 'subjek', 'pesan',
        'status', 'balasan', 'dibalas_oleh', 'dibalas_at',
        'catatan_admin',
    ];

    protected $validationRules = [
        'nama'  => 'required|min_length[3]|max_length[150]',
        'email' => 'required|valid_email|max_length[150]',
        'pesan' => 'required|min_length[10]',
    ];

    /** Semua pesan untuk admin, urut terbaru */
    public function getAllAdmin(array $filters = []): array
    {
        $builder = $this->orderBy('created_at', 'DESC');

        if (!empty($filters['status'])) {
            $builder->where('status', $filters['status']);
        }
        if (!empty($filters['q'])) {
            $builder->groupStart()
                    ->like('nama', $filters['q'])
                    ->orLike('email', $filters['q'])
                    ->orLike('subjek', $filters['q'])
                    ->groupEnd();
        }
        return $builder->findAll();
    }

    /** Statistik per status */
    public function getStatistik(): array
    {
        $db   = \Config\Database::connect();
        $rows = $db->query("
            SELECT status, COUNT(*) as total
            FROM pesan_kontak
            GROUP BY status
        ")->getResultArray();

        $result = [
            'belum_dibaca' => 0,
            'dibaca'       => 0,
            'dibalas'      => 0,
            'diarsipkan'   => 0,
            'total'        => 0,
        ];
        foreach ($rows as $r) {
            if (isset($result[$r['status']])) {
                $result[$r['status']] = (int)$r['total'];
            }
            $result['total'] += (int)$r['total'];
        }
        return $result;
    }

    /** Tandai sudah dibaca */
    public function markRead(int $id): void
    {
        $row = $this->find($id);
        if ($row && $row['status'] === 'belum_dibaca') {
            $this->update($id, ['status' => 'dibaca']);
        }
    }

    /** Simpan balasan */
    public function simpanBalasan(int $id, string $balasan, string $adminNama): bool
    {
        return $this->update($id, [
            'status'       => 'dibalas',
            'balasan'      => $balasan,
            'dibalas_oleh' => $adminNama,
            'dibalas_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    /** Update status & catatan */
    public function updateStatus(int $id, string $status, string $catatan = ''): bool
    {
        return $this->update($id, [
            'status'        => $status,
            'catatan_admin' => $catatan,
        ]);
    }
}