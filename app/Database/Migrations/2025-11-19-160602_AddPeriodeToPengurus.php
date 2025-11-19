<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPeriodeToPengurus extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pengurus', [
            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => '2024/2025', // Default periode saat ini
                'after'      => 'angkatan',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pengurus', 'periode');
    }
}