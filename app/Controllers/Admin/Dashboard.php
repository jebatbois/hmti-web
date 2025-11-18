<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PengurusModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();
        $pengurusModel = new PengurusModel();

        $data = [
            'title' => 'Dashboard',
            // Hitung jumlah data untuk ditampilkan di widget
            'total_berita'   => $beritaModel->countAll(),
            'total_pengurus' => $pengurusModel->countAll(),
            'berita_terbaru' => $beritaModel->orderBy('created_at', 'DESC')->findAll(5)
        ];

        return view('admin/dashboard', $data);
    }
}