<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Home extends BaseController
{
    public function index()
    {
        // Panggil Model Berita
        $beritaModel = new BeritaModel();

        $data = [
            'title'  => 'Beranda - HMTI FTTK UMRAH',
            // Ambil 3 berita terakhir
            'berita' => $beritaModel->orderBy('created_at', 'DESC')->findAll(3)
        ];

        return view('pages/home', $data);
    }
}