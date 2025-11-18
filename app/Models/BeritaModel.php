<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // TAMBAHKAN 'kategori_id' KE SINI
    protected $allowedFields    = ['judul', 'slug', 'isi', 'gambar', 'kategori_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Helper untuk mengambil berita beserta nama kategorinya
    public function getBeritaLengkap()
    {
        return $this->select('berita.*, kategori.nama_kategori, kategori.warna_label')
                    ->join('kategori', 'kategori.id = berita.kategori_id', 'left');
    }
}