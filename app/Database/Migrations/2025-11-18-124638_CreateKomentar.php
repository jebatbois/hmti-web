<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKomentar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'berita_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'isi_komentar' => [
                'type' => 'TEXT',
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('berita_id', 'berita', 'id', 'CASCADE', 'CASCADE'); // Relasi ke tabel berita
        $this->forge->createTable('komentar');
    }

    public function down()
    {
        $this->forge->dropTable('komentar');
    }
}