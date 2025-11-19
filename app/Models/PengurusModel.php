<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table            = 'pengurus';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'jabatan', 'departemen', 'sub_divisi', 'angkatan', 'periode', 'foto', 'urutan'];
    protected $useTimestamps    = true;
    
    // Ambil Pengurus Inti per Periode
    public function getInti($periode)
    {
        return $this->where('departemen', 'Pengurus Inti')
                    ->where('periode', $periode)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    // Ambil Departemen tertentu per Periode
    public function getDepartemen($nama_departemen, $periode)
    {
        return $this->where('departemen', $nama_departemen)
                    ->where('periode', $periode)
                    ->orderBy('urutan', 'ASC') // Koordinator dulu
                    ->orderBy('sub_divisi', 'ASC') // Lalu urutkan per divisi
                    ->findAll();
    }

    // Ambil daftar semua periode yang ada (untuk dropdown filter)
    public function getAllPeriode()
    {
        return $this->select('periode')->distinct()->orderBy('periode', 'DESC')->findColumn('periode') ?? [];
    }
}