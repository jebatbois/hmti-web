<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Home extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();

        $data = [
            'title'  => 'Beranda - HMTI FTTK UMRAH',
            // PERBAIKAN: Gunakan getBeritaLengkap() agar kategori/label terbawa
            'berita' => $beritaModel->getBeritaLengkap()
                                    ->orderBy('berita.created_at', 'DESC') // Spesifikasikan tabel 'berita'
                                    ->findAll(3)
        ];

        return view('pages/home', $data);
    }
}