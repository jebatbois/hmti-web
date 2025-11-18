<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategori extends Migration
{
    public function up()
    {
        // 1. Buat Tabel Kategori
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'warna_label' => [ // Untuk styling badge (misal: blue, green, red)
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'bg-hmti-primary',
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori');

        // 2. Tambah kolom kategori_id ke tabel berita
        // Kita gunakan query manual agar lebih aman saat alter table
        $this->db->query("ALTER TABLE berita ADD COLUMN kategori_id INT(5) UNSIGNED NULL AFTER id");
        
        // Isi data default kategori agar berita lama tidak error
        $this->db->query("INSERT INTO kategori (nama_kategori, slug_kategori, warna_label, created_at, updated_at) VALUES ('Berita & Kegiatan', 'berita-kegiatan', 'bg-green-600', NOW(), NOW())");
        $this->db->query("INSERT INTO kategori (nama_kategori, slug_kategori, warna_label, created_at, updated_at) VALUES ('Pengumuman', 'pengumuman', 'bg-yellow-500', NOW(), NOW())");
        $this->db->query("INSERT INTO kategori (nama_kategori, slug_kategori, warna_label, created_at, updated_at) VALUES ('Opini', 'opini', 'bg-blue-500', NOW(), NOW())");
        
        // Set semua berita lama ke kategori 1 (Berita & Kegiatan)
        $this->db->query("UPDATE berita SET kategori_id = 1 WHERE kategori_id IS NULL");
    }

    public function down()
    {
        $this->forge->dropColumn('berita', 'kategori_id');
        $this->forge->dropTable('kategori');
    }
}