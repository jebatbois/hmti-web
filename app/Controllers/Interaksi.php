<?php

namespace App\Controllers;

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

    // --- HALAMAN KONTAK ---
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
        $data = [
            'title' => 'Mimbar Bebas - Suara Mahasiswa',
            // Ambil pesan terbaru dulu
            'aspirasi' => $this->mimbarModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('pages/mimbar', $data);
    }

    public function kirimMimbar()
    {
        if (!$this->validate(['isi_aspirasi' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Pesan tidak boleh kosong.');
        }

        // Random warna background biar estetik (Tailwind classes)
        $colors = ['bg-yellow-100', 'bg-blue-100', 'bg-green-100', 'bg-pink-100', 'bg-purple-100', 'bg-orange-100'];
        $randomColor = $colors[array_rand($colors)];

        $this->mimbarModel->save([
            'nama_pengirim' => $this->request->getVar('nama_pengirim') ?: 'Anonim', // Jika kosong jadi Anonim
            'angkatan'      => $this->request->getVar('angkatan'),
            'isi_aspirasi'  => $this->request->getVar('isi_aspirasi'),
            'warna_bg'      => $randomColor
        ]);

        return redirect()->to('/mimbar')->with('success', 'Aspirasi Anda berhasil ditempel!');
    }
}