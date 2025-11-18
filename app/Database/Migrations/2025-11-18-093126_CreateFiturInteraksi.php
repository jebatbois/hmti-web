<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFiturInteraksi extends Migration
{
    public function up()
    {
        // 1. Tabel Pesan Kontak (Private ke Admin)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'subjek' => ['type' => 'VARCHAR', 'constraint' => 200],
            'pesan' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pesan_kontak');

        // 2. Tabel Mimbar Bebas (Public Wall)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_pengirim' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Anonim'],
            'angkatan' => ['type' => 'VARCHAR', 'constraint' => 4, 'null' => true], // Opsional
            'isi_aspirasi' => ['type' => 'TEXT'],
            'warna_bg' => ['type' => 'VARCHAR', 'constraint' => 20], // Biar warna-warni stickynya
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mimbar_bebas');
    }

    public function down()
    {
        $this->forge->dropTable('pesan_kontak');
        $this->forge->dropTable('mimbar_bebas');
    }
}