<?php

namespace App\Controllers;

use App\Models\ProkerModel;

class Proker extends BaseController
{
    protected $prokerModel;

    public function __construct()
    {
        $this->prokerModel = new ProkerModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Program Kerja - HMTI FT-TM',
            'proker' => $this->prokerModel->orderBy('tanggal_pelaksanaan', 'ASC')->findAll()
        ];

        return view('pages/proker', $data);
    }

    // Method Baru: Detail Proker
    public function detail($id)
    {
        $proker = $this->prokerModel->find($id);

        // Jika ID tidak ditemukan di database
        if (!$proker) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Program kerja tidak ditemukan.");
        }

        $data = [
            'title'  => $proker['nama_program'],
            'p'      => $proker, // Kirim data proker sebagai variabel 'p'
            // Ambil proker lain untuk rekomendasi (kecuali yang sedang dibuka)
            'lainnya'=> $this->prokerModel->where('id !=', $id)->orderBy('tanggal_pelaksanaan', 'DESC')->findAll(3)
        ];

        return view('pages/proker_detail', $data);
    }
}