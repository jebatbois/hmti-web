<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\MimbarModel;

class InteraksiController extends BaseController
{
    protected $pesanModel;
    protected $mimbarModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->mimbarModel = new MimbarModel();
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
}