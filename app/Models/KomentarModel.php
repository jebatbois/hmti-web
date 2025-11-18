<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table            = 'komentar';
    protected $primaryKey       = 'id';
    // HAPUS 'email' dari sini
    protected $allowedFields    = ['berita_id', 'nama', 'isi_komentar', 'status']; 
    protected $useTimestamps    = true;

    public function getKomentarLengkap()
    {
        return $this->select('komentar.*, berita.judul as judul_berita, berita.slug as slug_berita')
                    ->join('berita', 'berita.id = komentar.berita_id', 'left');
    }
}