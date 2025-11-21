<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\MimbarModel;

class Interaksi extends BaseController
{
    protected $pesanModel;
    protected $mimbarModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->mimbarModel = new MimbarModel();
    }

    // --- METHOD HELPER: CEK KATA KASAR ---
    private function mengandungKataKasar($text)
    {
        $badWords = [
            'anjing', 'babi', 'bangsat', 'kontol', 'memek', 'jembut', 'ngentot', 
            'pantek', 'pukimak', 'sialan', 'goblog', 'goblok', 'tolol', 'idiot', 
            'brengsek', 'bajingan', 'kampret', 'keparat', 'bejad', 'setan', 'iblis', 'nenen', 'tetek', 'tete', 'tt', 'toket', 
            'bajing', 'bajeng', 'bajengut', 'bacot', 'banci', 'bego', 'brengsek',
            'koncet', 'pepek', 'pepekmu', 'pepek lo', 'pepek lu', 'puki', 'pukimu', 'puki lo', 'puki lu',
            'ngentotmu', 'ngentot lo', 'ngentot lu', 'jancok', 'jancuk', 'jancukmu', 'jancok lo', 'jancok lu',
            'tai', 'tahi', 'taik', 'taikmu', 'taik lo', 'taik lu', 'tololmu', 'tolol lo', 'tolol lu',
            'idiotmu', 'idiot lo', 'idiot lu', 'goblokmu', 'goblok lo', 'goblok lu',
            'bego mu', 'bego lo', 'bego lu', 'ppk', 'ajg', 'ngntd', 'njing', 'bngst',
            'brengsek mu', 'brengsek lo', 'brengsek lu',
            'bajingan mu', 'bajingan lo', 'bajingan lu',
            'kampret mu', 'kampret lo', 'kampret lu', 'bujang', 'bujang enam', 'bujang gaul',
            // Versi Leetspeak / Modifikasi            
            '4nj1ng', 'b4b1', 'k0nt0l', 'm3m3k', 'j3mbut', 'ng3nt0t', 
            'p4nt3k', 's14l4n', 'g0bl0g', 'g0bl0k', 't0l0l', '1di0t',
            'br3ngs3k', 'b4j1ng4n', 'k4mpr3t', 'k3p4r4t', 'b3j4d', 's3t4n', '1bl1s', 'k0nc3t'
        ];

        $replacements = [
            '4' => 'a', '@' => 'a', '3' => 'e', '1' => 'i', '!' => 'i',
            '0' => 'o', '5' => 's', '$' => 's', '7' => 't', '6' => 'g', '8' => 'b'
        ];
        
        $normalizedText = strtolower($text);
        $normalizedText = strtr($normalizedText, $replacements);
        
        foreach ($badWords as $word) {
            if (strpos($normalizedText, $word) !== false) {
                return true; 
            }
        }
        return false; 
    }

    public function kontak()
    {
        $data = ['title' => 'Hubungi Kami - HMTI FT-TM'];
        return view('pages/kontak', $data);
    }

    public function kirimKontak()
    {
        if (!$this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email',
            'pesan' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Mohon lengkapi data dengan benar.');
        }

        $this->pesanModel->save([
            'nama'   => $this->request->getVar('nama'),
            'email'  => $this->request->getVar('email'),
            'subjek' => $this->request->getVar('subjek'),
            'pesan'  => $this->request->getVar('pesan'),
        ]);

        return redirect()->to('/kontak')->with('success', 'Pesan Anda berhasil dikirim! Terima kasih.');
    }

    // --- HALAMAN MIMBAR BEBAS ---
    public function mimbar()
    {
        // HAPUS LOGIKA CAPTCHA DARI SINI

        $data = [
            'title' => 'Mimbar Bebas - Suara Mahasiswa',
            'aspirasi' => $this->mimbarModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('pages/mimbar', $data);
    }

    public function kirimMimbar()
    {
        // 1. Validasi Input Dasar + Panjang Karakter
        if (!$this->validate([
            'isi_aspirasi' => [
                'rules' => 'required|min_length[10]|max_length[500]', 
                'errors' => [
                    'required' => 'Pesan tidak boleh kosong.',
                    'min_length' => 'Pesan terlalu pendek (minimal 10 karakter).',
                    'max_length' => 'Pesan terlalu panjang (maksimal 500 karakter).'
                ]
            ]
            // HAPUS validasi captcha
        ])) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('error', reset($errors));
        }

        // 2. Validasi Rate Limit (Tetap dipertahankan agar tidak spamming)
        $lastPostTime = session()->get('last_mimbar_post_time');
        if ($lastPostTime && (time() - $lastPostTime < 60)) {
            $sisaWaktu = 60 - (time() - $lastPostTime);
            return redirect()->back()->withInput()->with('error', "Tunggu $sisaWaktu detik lagi sebelum mengirim pesan baru.");
        }

        $pesan = $this->request->getVar('isi_aspirasi');
        $namaPengirim = $this->request->getVar('nama_pengirim');

        // 3. Validasi Kata Kasar
        if ($this->mengandungKataKasar($pesan) || $this->mengandungKataKasar($namaPengirim)) {
            return redirect()->back()->withInput()->with('error', 'Eits! Gunakan bahasa yang sopan ya. Kata kasar atau samaran terdeteksi.');
        }

        // Jika Lolos
        $colors = ['bg-yellow-100', 'bg-blue-100', 'bg-green-100', 'bg-pink-100', 'bg-purple-100', 'bg-orange-100'];
        $randomColor = $colors[array_rand($colors)];

        $this->mimbarModel->save([
            'nama_pengirim' => $namaPengirim ?: 'Anonim',
            'angkatan'      => $this->request->getVar('angkatan'),
            'isi_aspirasi'  => $pesan,
            'warna_bg'      => $randomColor 
        ]);

        session()->set('last_mimbar_post_time', time());

        return redirect()->to('/mimbar')->with('success', 'Aspirasi Anda berhasil ditempel!');
    }
}