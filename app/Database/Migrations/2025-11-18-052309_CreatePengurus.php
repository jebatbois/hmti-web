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
                'type'       => 'VARCHAR', 
                'constraint' => '100', // Contoh: Ketua Himpunan, Sekretaris Umum 1, Staff
            ],
            'departemen' => [
                'type'       => 'VARCHAR', 
                'constraint' => '100', // Contoh: Pengurus Inti, Departemen MTI, Departemen PPM
            ],
            'sub_divisi' => [
                'type'       => 'VARCHAR', 
                'constraint' => '100', // Contoh: Divisi Kaderisasi, Divisi Multimedia (Bisa NULL untuk Inti)
                'null'       => true,
            ],
            'angkatan' => [
                'type'       => 'YEAR',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default'    => 'default.png',
            ],
            'urutan' => [
                'type'       => 'INT', 
                'constraint' => 5, 
                'default'    => 100, // Semakin kecil angkanya, semakin di atas posisinya
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