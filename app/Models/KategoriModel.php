<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_kategori', 'slug_kategori', 'warna_label'];
    protected $useTimestamps    = true;
}