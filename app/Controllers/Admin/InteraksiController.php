<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\MimbarModel;
use App\Models\KomentarModel; // Pastikan Model ini diload

class InteraksiController extends BaseController
{
    protected $pesanModel;
    protected $mimbarModel;
    protected $komentarModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->mimbarModel = new MimbarModel();
        $this->komentarModel = new KomentarModel(); // Init Model
    }

    // --- MANAJEMEN PESAN KONTAK ---

    public function pesan()
    {
        $data = [
            'title' => 'Kotak Masuk Pesan',
            'pesan' => $this->pesanModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/interaksi/pesan', $data);
    }

    public function deletePesan($id)
    {
        $this->pesanModel->delete($id);
        return redirect()->to('/admin/pesan')->with('success', 'Pesan berhasil dihapus.');
    }

    // --- MANAJEMEN MIMBAR BEBAS ---

    public function mimbar()
    {
        $data = [
            'title'    => 'Moderasi Mimbar Bebas',
            'aspirasi' => $this->mimbarModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/interaksi/mimbar', $data);
    }

    public function deleteMimbar($id)
    {
        $this->mimbarModel->delete($id);
        return redirect()->to('/admin/mimbar')->with('success', 'Aspirasi berhasil dihapus (Moderasi).');
    }

    // --- MANAJEMEN KOMENTAR BERITA (Bagian yang tadi Missing) ---

    public function komentar()
    {
        $data = [
            'title'    => 'Moderasi Komentar Berita',
            // Menggunakan getKomentarLengkap() dari Model
            'komentar' => $this->komentarModel->getKomentarLengkap()->orderBy('komentar.created_at', 'DESC')->findAll()
        ];
        return view('admin/interaksi/komentar', $data);
    }

    // Fitur Toggle: Sembunyikan/Tampilkan
    public function toggleKomentar($id, $status)
    {
        // Jika status saat ini 'tampil', ubah jadi 'sembunyi', dan sebaliknya
        $newStatus = ($status == 'tampil') ? 'sembunyi' : 'tampil';
        
        $this->komentarModel->update($id, ['status' => $newStatus]);
        
        $msg = ($newStatus == 'tampil') ? 'Komentar ditampilkan kembali.' : 'Komentar disembunyikan.';
        return redirect()->to('/admin/komentar')->with('success', $msg);
    }

    public function deleteKomentar($id)
    {
        $this->komentarModel->delete($id);
        return redirect()->to('/admin/komentar')->with('success', 'Komentar dihapus permanen.');
    }
}