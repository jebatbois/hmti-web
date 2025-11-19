<?php

namespace App\Models;

use CodeIgniter\Model;

class BankSoalModel extends Model
{
    protected $table            = 'bank_soal';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['mata_kuliah', 'semester', 'jenis_ujian', 'tahun_akademik', 'file_soal', 'dosen'];
    protected $useTimestamps    = true;
}