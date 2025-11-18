<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotoToProkerTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('program_kerja', [
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'default'    => 'default_proker.jpg', // Default image
                'after'      => 'deskripsi', // Letakkan setelah kolom deskripsi
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('program_kerja', 'foto');
    }
}