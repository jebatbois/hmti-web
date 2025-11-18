<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table            = 'pengurus';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'jabatan', 'departemen', 'sub_divisi', 'angkatan', 'foto', 'urutan'];
    protected $useTimestamps    = true;
    
    // Ambil Pengurus Inti
    public function getInti()
    {
        return $this->where('departemen', 'Pengurus Inti')
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    // Ambil Departemen tertentu (misal: MTI)
    public function getDepartemen($nama_departemen)
    {
        return $this->where('departemen', $nama_departemen)
                    ->orderBy('urutan', 'ASC') // Koordinator dulu
                    ->orderBy('sub_divisi', 'ASC') // Lalu urutkan per divisi
                    ->findAll();
    }
}