<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Label Berita',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori/index', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => 'required|is_unique[kategori.nama_kategori]',
            'warna_label'   => 'required'
        ])) {
            return redirect()->back()->with('error', 'Nama kategori harus unik dan wajib diisi.');
        }

        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'slug_kategori' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'warna_label'   => $this->request->getVar('warna_label')
        ]);

        return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update($id)
    {
        $this->kategoriModel->save([
            'id'            => $id,
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'slug_kategori' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'warna_label'   => $this->request->getVar('warna_label')
        ]);
        return redirect()->to('/admin/kategori')->with('success', 'Kategori diperbarui.');
    }

    public function delete($id)
    {
        // Cek apakah ada berita yang menggunakan kategori ini
        $db = \Config\Database::connect();
        $cek = $db->table('berita')->where('kategori_id', $id)->countAllResults();

        if($cek > 0) {
            return redirect()->to('/admin/kategori')->with('error', 'Gagal hapus! Masih ada berita yang menggunakan label ini.');
        }

        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori')->with('success', 'Kategori dihapus.');
    }
}