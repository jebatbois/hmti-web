<?php

namespace App\Controllers;

class ComingSoon extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kabinet Nawakara - Segera Hadir',
            // Format: YYYY-MM-DD HH:MM:SS
            // 6 Desember 2025, Pukul 22:00 (10 Malam)
            'target_date' => '2025-12-06 22:00:00' 
        ];
        return view('pages/coming_soon', $data);
    }
}