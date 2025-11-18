<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengurusModel;

class Profil extends BaseController
{
    protected $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Struktur Organisasi HMTI',
            'inti'    => $this->pengurusModel->getInti(),
            // Ambil data per departemen
            'ppm'     => $this->pengurusModel->getDepartemen('Departemen PPM'),
            'minba'   => $this->pengurusModel->getDepartemen('Departemen Minat & Bakat'), // <--- DEPARTEMEN BARU
            'mti'     => $this->pengurusModel->getDepartemen('Departemen MTI'),
            'litbang' => $this->pengurusModel->getDepartemen('Departemen Litbang'),
            'kwu'     => $this->pengurusModel->getDepartemen('Departemen Kewirausahaan'),
        ];

        return view('pages/profil', $data);
    }
}