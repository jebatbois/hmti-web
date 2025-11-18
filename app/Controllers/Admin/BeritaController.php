<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    // 1. READ (List Berita)
    public function index()
    {
        $data = [
            'title'  => 'Manajemen Berita',
            'berita' => $this->beritaModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/berita/index', $data);
    }

    // 2. CREATE (Form Tambah)
    public function create()
    {
        $data = ['title' => 'Tulis Berita Baru'];
        return view('admin/berita/create', $data);
    }

    // 3. STORE (Proses Simpan)
    public function store()
    {
        // PERBAIKAN: Ubah max_size dan ext_in
        if (!$this->validate([
            'judul'  => 'required|min_length[5]',
            'isi'    => 'required',
            'gambar' => [
                'rules' => 'permit_empty|is_image[gambar]|ext_in[gambar,png,jpg,jpeg,gif,webp]|max_size[gambar,10240]', // 10MB
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'ext_in'   => 'Hanya menerima file PNG, JPG, JPEG, GIF, atau WebP.',
                    'max_size' => 'Ukuran gambar terlalu besar (Maks 10MB).'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        
        // PERBAIKAN: Mengganti hasError() dengan getError() == 0
        if ($fileGambar->isValid() && $fileGambar->getError() == 0) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'img/berita', $namaGambar);
        } else {
            $namaGambar = null; 
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->beritaModel->save([
            'judul'  => $this->request->getVar('judul'),
            'slug'   => $slug,
            'isi'    => $this->request->getVar('isi'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 4. EDIT (Form Edit)
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Berita',
            'berita' => $this->beritaModel->find($id)
        ];
        return view('admin/berita/edit', $data);
    }

    // 5. UPDATE (Proses Update)
    public function update($id)
    {
        // PERBAIKAN: Ubah max_size dan ext_in
        if (!$this->validate([
            'judul'  => 'required|min_length[5]',
            'isi'    => 'required',
            'gambar' => [
                'rules' => 'permit_empty|is_image[gambar]|ext_in[gambar,png,jpg,jpeg,gif,webp]|max_size[gambar,10240]', // 10MB
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'ext_in'   => 'Hanya menerima file PNG, JPG, JPEG, GIF, atau WebP.',
                    'max_size' => 'Ukuran gambar terlalu besar (Maks 10MB).'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $beritaLama = $this->beritaModel->find($id);

        // PERBAIKAN: Mengganti hasError() dengan getError() == 0
        if ($fileGambar->isValid() && $fileGambar->getError() == 0) {
            // Jika Valid: Upload file baru
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'img/berita', $namaGambar);
            
            $pathLama = FCPATH . 'img/berita/' . $beritaLama['gambar'];
            if ($beritaLama['gambar'] && file_exists($pathLama)) {
                unlink($pathLama);
            }
        } else {
            // Gunakan gambar lama
            $namaGambar = $beritaLama['gambar']; 
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->beritaModel->update($id, [
            'judul'  => $this->request->getVar('judul'),
            'slug'   => $slug,
            'isi'    => $this->request->getVar('isi'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. DELETE (Hapus)
    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);

        $pathGambar = FCPATH . 'img/berita/' . $berita['gambar'];
        if ($berita['gambar'] && file_exists($pathGambar)) {
            unlink($pathGambar);
        }

        $this->beritaModel->delete($id);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil dihapus.');
    }
}