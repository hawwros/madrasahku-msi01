<?php namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal_belajar';
    protected $allowedFields = ['hari','waktu','keterangan'];

    public function getAllGrouped()
    {
        try {
            if ($this->db->tableExists($this->table)) {
                $rows = $this->orderBy('id','ASC')->findAll();
                $grouped = [];
                foreach ($rows as $r) {
                    $grouped[$r['hari']][] = $r;
                }
                return $grouped;
            }
        } catch (\Exception $e) {
        }

        // fallback sample
        return [
            'Senin - Kamis' => [['waktu'=>'07:00 - 15:00','keterangan'=>'Pembelajaran Reguler (Kurikulum Nasional & Madrasah)']],
            'Jumat' => [['waktu'=>'Libur','keterangan'=>'Tidak ada kegiatan pembelajaran']],
            'Sabtu - Minggu' => [['waktu'=>'07:00 - 15:00','keterangan'=>'Pembelajaran reguler & ekstrakurikuler']],
        ];
    }
}
