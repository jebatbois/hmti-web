<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengurusModel;

class Profil extends BaseController
{
    protected $pengurusModel;

    public function __construct()
    {
        // Load model di constructor agar bisa dipakai di semua fungsi
        $this->pengurusModel = new PengurusModel();
    }

    public function index()
    {
        // Mengelompokkan data
        $data = [
            'title' => 'Profil & Struktur Organisasi',
            'bph'   => $this->pengurusModel->getByDivisi('BPH'),
            'kominfo' => $this->pengurusModel->getByDivisi('Kominfo'),
            // Bisa ambil semua juga:
            // 'semua_pengurus' => $this->pengurusModel->findAll()
        ];

        return view('pages/profil', $data);
    }
}