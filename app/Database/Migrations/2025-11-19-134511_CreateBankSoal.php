<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBankSoal extends Migration
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
            'mata_kuliah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'semester' => [ // Semester 1, 2, 3...
                'type'       => 'INT',
                'constraint' => 2,
            ],
            'jenis_ujian' => [ // UTS, UAS, Kuis
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tahun_akademik' => [ // 2023/2024, 2024/2025
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'file_soal' => [ // Nama file PDF
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'dosen' => [ // Opsional: Nama Dosen
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bank_soal');
    }

    public function down()
    {
        $this->forge->dropTable('bank_soal');
    }
}