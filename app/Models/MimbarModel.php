<?php

namespace App\Models;

use CodeIgniter\Model;

class MimbarModel extends Model
{
    protected $table            = 'mimbar_bebas';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_pengirim', 'angkatan', 'isi_aspirasi', 'warna_bg'];
    protected $useTimestamps    = true;
}