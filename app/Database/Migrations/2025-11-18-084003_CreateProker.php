<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProker extends Migration
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
            'nama_program' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'departemen' => [
                'type'       => 'VARCHAR',
                'constraint' => '100', // Misal: Dinas Kominfo
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Rencana', 'Sedang Berjalan', 'Terlaksana'],
                'default'    => 'Rencana',
            ],
            'tanggal_pelaksanaan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('program_kerja');
    }

    public function down()
    {
        $this->forge->dropTable('program_kerja');
    }
}