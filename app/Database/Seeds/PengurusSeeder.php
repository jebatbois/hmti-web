<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengurusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'Fajri Hasan',
                'jabatan'  => 'Ketua Umum',
                'divisi'   => 'Inti',
                'angkatan' => '2023',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'     => 'Muhammad Radit',
                'jabatan'  => 'Wakil Ketua Umum',
                'divisi'   => 'Kominfo',
                'angkatan' => '2023',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'     => 'Muhammad Kartiman',
                'jabatan'  => 'Ketua Divisi',
                'divisi'   => 'Kaderisasi',
                'angkatan' => '2023',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Insert batch (banyak data sekaligus)
        $this->db->table('pengurus')->insertBatch($data);
    }
}