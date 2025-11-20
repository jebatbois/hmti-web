<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPenulisToBerita extends Migration
{
    public function up()
    {
        $fields = [
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'default'    => 'Admin HMTI', // Default value jika kosong
                'after'      => 'judul'
            ],
        ];
        $this->forge->addColumn('berita', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('berita', 'penulis');
    }
}