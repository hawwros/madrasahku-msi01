<?php namespace App\Models;

use CodeIgniter\Model;

class TenagaModel extends Model
{
    protected $table = 'tenaga_pendidik';
    protected $allowedFields = ['nama','bidang','pendidikan','jabatan'];

    public function getAll()
    {
        try {
            if ($this->db->tableExists($this->table)) {
                return $this->orderBy('nama','ASC')->findAll();
            }
        } catch (\Exception $e) {
        }

        // fallback
        return [
            ['nama'=>'Drs. Hj. Fatimah Azzahra','bidang'=>'Bahasa Arab & Al-Quran','pendidikan'=>'S1 Pendidikan Bahasa Arab'],
            ['nama'=>'Ahmad Rofik, S.Pd','bidang'=>'Matematika','pendidikan'=>'S1 Pendidikan Matematika'],
            ['nama'=>'Siti Nurhaliza, S.Pd','bidang'=>'Bahasa Inggris','pendidikan'=>'S1 Pendidikan Bahasa Inggris'],
            ['nama'=>'Muhammad Rizki, S.Si','bidang'=>'IPA & Biologi','pendidikan'=>'S1 Biologi'],
        ];
    }
}
