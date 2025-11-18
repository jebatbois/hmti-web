<?php

namespace App\Models;

use CodeIgniter\Model;

class ProkerModel extends Model
{
    protected $table            = 'program_kerja';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_program', 'departemen', 'deskripsi', 'foto', 'status', 'tanggal_pelaksanaan']; // Tambah 'foto'
    protected $useTimestamps    = true;
}