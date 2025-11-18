<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengurusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --- PENGURUS INTI ---
            ['nama' => 'Nama Ketua', 'jabatan' => 'Ketua Himpunan', 'departemen' => 'Pengurus Inti', 'sub_divisi' => null, 'urutan' => 1, 'angkatan' => '2022'],
            ['nama' => 'Nama Wakil', 'jabatan' => 'Wakil Ketua', 'departemen' => 'Pengurus Inti', 'sub_divisi' => null, 'urutan' => 2, 'angkatan' => '2022'],
            ['nama' => 'Nama Sekkum 1', 'jabatan' => 'Sekretaris Umum 1', 'departemen' => 'Pengurus Inti', 'sub_divisi' => null, 'urutan' => 3, 'angkatan' => '2022'],
            ['nama' => 'Nama Sekkum 2', 'jabatan' => 'Sekretaris Umum 2', 'departemen' => 'Pengurus Inti', 'sub_divisi' => null, 'urutan' => 4, 'angkatan' => '2023'],
            ['nama' => 'Nama Bendum', 'jabatan' => 'Bendahara Umum', 'departemen' => 'Pengurus Inti', 'sub_divisi' => null, 'urutan' => 5, 'angkatan' => '2022'],

            // --- DEPARTEMEN PPM ---
            ['nama' => 'Nama Koord PPM', 'jabatan' => 'Koordinator Departemen', 'departemen' => 'Departemen PPM', 'sub_divisi' => null, 'urutan' => 10, 'angkatan' => '2022'],
            // Rifqy (Anda) ada disini:
            ['nama' => 'Rifqy Athaya Prayuda', 'jabatan' => 'Staff', 'departemen' => 'Departemen PPM', 'sub_divisi' => 'Divisi Pengembangan SDM & Kaderisasi', 'urutan' => 11, 'angkatan' => '2023'],
            ['nama' => 'Staff A', 'jabatan' => 'Staff', 'departemen' => 'Departemen PPM', 'sub_divisi' => 'Divisi Hubungan & Relasi', 'urutan' => 12, 'angkatan' => '2023'],
            ['nama' => 'Staff B', 'jabatan' => 'Staff', 'departemen' => 'Departemen PPM', 'sub_divisi' => 'Divisi Sosial & Pengabdian', 'urutan' => 12, 'angkatan' => '2023'],

            // --- DEPARTEMEN MTI ---
            ['nama' => 'Nama Koord MTI', 'jabatan' => 'Koordinator Departemen', 'departemen' => 'Departemen MTI', 'sub_divisi' => null, 'urutan' => 20, 'angkatan' => '2022'],
            ['nama' => 'Staff IT', 'jabatan' => 'Staff', 'departemen' => 'Departemen MTI', 'sub_divisi' => 'Divisi Pengembangan Sistem', 'urutan' => 21, 'angkatan' => '2023'],
            ['nama' => 'Staff Desain', 'jabatan' => 'Staff', 'departemen' => 'Departemen MTI', 'sub_divisi' => 'Divisi Desain & Multimedia', 'urutan' => 21, 'angkatan' => '2023'],

            // --- LITBANG ---
            ['nama' => 'Nama Koord Litbang', 'jabatan' => 'Koordinator Departemen', 'departemen' => 'Departemen Litbang', 'sub_divisi' => null, 'urutan' => 30, 'angkatan' => '2022'],

             // --- KEWIRAUSAHAAN ---
             ['nama' => 'Nama Koord KWU', 'jabatan' => 'Koordinator Departemen', 'departemen' => 'Departemen Kewirausahaan', 'sub_divisi' => null, 'urutan' => 40, 'angkatan' => '2022'],
        ];

        $this->db->table('pengurus')->insertBatch($data);
    }
}