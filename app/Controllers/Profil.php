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
        // 1. Ambil semua periode
        $semuaPeriode = $this->pengurusModel->getAllPeriode();
        
        if (empty($semuaPeriode)) {
            $semuaPeriode = [date('Y') . '/' . (date('Y') + 1)];
        }

        // 2. Tentukan periode aktif
        $periodeAktif = $this->request->getGet('periode') ?? $semuaPeriode[0];

        // --- LOGIKA NAMA KABINET ---
        $listKabinet = [
            '2024/2025' => 'Kabinet Sahitya',
            '2025/2026' => 'Kabinet Nawakara',
        ];

        // Ambil nama kabinet, jika tidak ada di list gunakan default
        $namaKabinet = $listKabinet[$periodeAktif] ?? 'Kabinet HMTI'; 

        // 3. Ambil Data Pengurus
        $allData = $this->pengurusModel->where('periode', $periodeAktif)
                                       ->orderBy('urutan', 'ASC')
                                       ->findAll();
        
        $groupedData = [];
        $inti = [];

        foreach ($allData as $p) {
            if ($p['departemen'] == 'Pengurus Inti') {
                $inti[] = $p;
            } else {
                $groupedData[$p['departemen']][] = $p;
            }
        }

        $data = [
            'title'        => 'Struktur Organisasi HMTI',
            'periode_list' => $semuaPeriode,
            'periode_aktif'=> $periodeAktif,
            'nama_kabinet' => $namaKabinet, 
            'inti'         => $inti,
            'departemen'   => $groupedData 
        ];

        return view('pages/profil', $data);
    }
}