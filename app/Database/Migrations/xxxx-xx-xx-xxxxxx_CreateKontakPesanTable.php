<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKontakPesanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama'         => ['type' => 'VARCHAR', 'constraint' => 150],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'telepon'      => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'subjek'       => ['type' => 'VARCHAR', 'constraint' => 200],
            'pesan'        => ['type' => 'TEXT'],
            'status'       => ['type' => 'ENUM', 'constraint' => ['belum_dibaca', 'sudah_dibaca', 'ditindaklanjuti'], 'default' => 'belum_dibaca'],
            'dibuat_pada'  => ['type' => 'DATETIME'],
            'dibaca_pada'  => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('kontak_pesan');
    }

    public function down()
    {
        $this->forge->dropTable('kontak_pesan');
    }
}