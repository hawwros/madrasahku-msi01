<?php

namespace App\Models;

use CodeIgniter\Model;

class SpmbmModel extends Model
{
    protected $table            = 'spmbm_pendaftar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'nama_lengkap', 'nama_panggilan', 'jenis_kelamin', 'nik', 'tempat_lahir',
        'tanggal_lahir', 'agama', 'warga_negara', 'pernah_paud', 'pernah_tk',
        'hobi', 'cita_cita', 'anak_ke', 'jumlah_saudara', 'tinggi_badan',
        'berat_badan', 'lingkar_kepala', 'no_kk',
        'nama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'pendidikan_ayah',
        'pekerjaan_ayah', 'hp_ayah', 'penghasilan_ayah',
        'nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'pendidikan_ibu',
        'pekerjaan_ibu', 'hp_ibu', 'penghasilan_ibu',
        'kk_file', 'akta_file', 'status', 'dibuat_pada',
    ];
}