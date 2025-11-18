<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table            = 'pesan_kontak';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'email', 'subjek', 'pesan'];
    protected $useTimestamps    = true;
}