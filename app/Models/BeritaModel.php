<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Bisa diganti 'object' jika suka style $data->judul
    protected $useSoftDeletes   = false;

    // Kolom yang boleh diisi manual (PENTING untuk keamanan)
    protected $allowedFields    = ['judul', 'slug', 'isi', 'gambar'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}