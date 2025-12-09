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
        // 1. Ambil semua periode yang ada di database
        $semuaPeriode = $this->pengurusModel->getAllPeriode();
        
        if (empty($semuaPeriode)) {
            // Fallback jika database kosong total
            $semuaPeriode = ['2024/2025']; 
        }

        // 2. Tentukan periode aktif
        // PERBAIKAN: Default-kan ke '2024/2025' secara eksplisit jika URL kosong.
        // Jangan gunakan $semuaPeriode[0] karena itu akan mengambil tahun terbaru (2025/2026).
        $periodeAktif = $this->request->getGet('periode') ?? '2024/2025';

        // --- LOGIKA NAMA KABINET ---
        $listKabinet = [
            '2024/2025' => 'Kabinet Sahitya',
            '2025/2026' => 'Kabinet Nawakara',
        ];

        $namaKabinet = $listKabinet[$periodeAktif] ?? 'Kabinet HMTI'; 

        // 3. Ambil Data Pengurus Sesuai Periode
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