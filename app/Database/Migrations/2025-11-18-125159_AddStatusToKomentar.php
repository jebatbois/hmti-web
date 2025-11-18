<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToKomentar extends Migration
{
    public function up()
    {
        $this->forge->addColumn('komentar', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['tampil', 'sembunyi'],
                'default'    => 'tampil',
                'after'      => 'isi_komentar',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('komentar', 'status');
    }
}