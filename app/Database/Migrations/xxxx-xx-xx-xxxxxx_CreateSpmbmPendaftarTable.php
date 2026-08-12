<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSpmbmPendaftarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],

            // Data Siswa
            'nama_lengkap'      => ['type' => 'VARCHAR', 'constraint' => 150],
            'nama_panggilan'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'jenis_kelamin'     => ['type' => 'ENUM', 'constraint' => ['L', 'P']],
            'nik'               => ['type' => 'VARCHAR', 'constraint' => 16, 'null' => true],
            'tempat_lahir'      => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tanggal_lahir'     => ['type' => 'DATE', 'null' => true],
            'agama'             => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'warga_negara'      => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'pernah_paud'       => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'pernah_tk'         => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'hobi'              => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'cita_cita'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'anak_ke'           => ['type' => 'INT', 'constraint' => 5, 'null' => true],
            'jumlah_saudara'    => ['type' => 'INT', 'constraint' => 5, 'null' => true],
            'tinggi_badan'      => ['type' => 'DECIMAL', 'constraint' => '5,1', 'null' => true],
            'berat_badan'       => ['type' => 'DECIMAL', 'constraint' => '5,1', 'null' => true],
            'lingkar_kepala'    => ['type' => 'DECIMAL', 'constraint' => '5,1', 'null' => true],
            'no_kk'             => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],

            // Data Ayah
            'nama_ayah'          => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'tempat_lahir_ayah'  => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tanggal_lahir_ayah' => ['type' => 'DATE', 'null' => true],
            'pendidikan_ayah'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'pekerjaan_ayah'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'hp_ayah'            => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'penghasilan_ayah'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],

            // Data Ibu
            'nama_ibu'          => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'tempat_lahir_ibu'  => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tanggal_lahir_ibu' => ['type' => 'DATE', 'null' => true],
            'pendidikan_ibu'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'pekerjaan_ibu'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'hp_ibu'            => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'penghasilan_ibu'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],

            // Lampiran & Status
            'kk_file'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'akta_file'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'       => ['type' => 'ENUM', 'constraint' => ['baru', 'diverifikasi', 'diterima', 'ditolak'], 'default' => 'baru'],
            'dibuat_pada'  => ['type' => 'DATETIME'],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('spmbm_pendaftar');
    }

    public function down()
    {
        $this->forge->dropTable('spmbm_pendaftar');
    }
}