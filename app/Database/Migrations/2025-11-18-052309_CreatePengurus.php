<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengurus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jabatan' => [
                'type'       => 'VARCHAR', // Contoh: Ketua Umum, Kadiv Kominfo
                'constraint' => '100',
            ],
            'divisi' => [
                'type'       => 'VARCHAR', // Contoh: Inti, Kominfo, Kaderisasi
                'constraint' => '50',
                'null'       => true,
            ],
            'angkatan' => [
                'type'       => 'YEAR',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default'    => 'default.jpg',
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengurus');
    }

    public function down()
    {
        $this->forge->dropTable('pengurus');
    }
}