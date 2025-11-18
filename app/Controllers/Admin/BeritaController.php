<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel; // Load Model Kategori

class BeritaController extends BaseController
{
    protected $beritaModel;
    protected $kategoriModel; // Property baru

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel(); // Init
    }

    // 1. READ (List Berita) - Update Query agar menampilkan nama kategori
    public function index()
    {
        $data = [
            'title'  => 'Manajemen Berita',
            // Gunakan method baru getBeritaLengkap()
            'berita' => $this->beritaModel->getBeritaLengkap()->orderBy('berita.created_at', 'DESC')->findAll()
        ];
        return view('admin/berita/index', $data);
    }

    // 2. CREATE (Kirim data kategori ke view)
    public function create()
    {
        $data = [
            'title' => 'Tulis Berita Baru',
            'kategori' => $this->kategoriModel->findAll() // Kirim daftar kategori
        ];
        return view('admin/berita/create', $data);
    }

    // 3. STORE (Simpan kategori_id)
    public function store()
    {
        // ... validasi judul, isi, gambar (sama seperti sebelumnya) ...
        // Tambahkan validasi kategori
        if (!$this->validate([
            'judul' => 'required',
            'kategori_id' => 'required', // Wajib pilih
            // ... validasi gambar ...
             'gambar' => [
                'rules' => 'permit_empty|is_image[gambar]|ext_in[gambar,png,jpg,jpeg,gif,webp]|max_size[gambar,10240]', 
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
        if ($fileGambar->isValid() && $fileGambar->getError() == 0) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'img/berita', $namaGambar);
        } else {
            $namaGambar = null; 
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->beritaModel->save([
            'judul'       => $this->request->getVar('judul'),
            'slug'        => $slug,
            'kategori_id' => $this->request->getVar('kategori_id'), // Simpan ID
            'isi'         => $this->request->getVar('isi'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 4. EDIT (Kirim data kategori)
    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Berita',
            'berita'   => $this->beritaModel->find($id),
            'kategori' => $this->kategoriModel->findAll() // Kirim daftar kategori
        ];
        return view('admin/berita/edit', $data);
    }

    // 5. UPDATE (Simpan kategori_id)
    public function update($id)
    {
         // ... validasi ...
          if (!$this->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
             'gambar' => [
                'rules' => 'permit_empty|is_image[gambar]|ext_in[gambar,png,jpg,jpeg,gif,webp]|max_size[gambar,10240]', 
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

        if ($fileGambar->isValid() && $fileGambar->getError() == 0) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'img/berita', $namaGambar);
            $pathLama = FCPATH . 'img/berita/' . $beritaLama['gambar'];
            if ($beritaLama['gambar'] && file_exists($pathLama)) {
                unlink($pathLama);
            }
        } else {
            $namaGambar = $beritaLama['gambar']; 
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->beritaModel->update($id, [
            'judul'       => $this->request->getVar('judul'),
            'slug'        => $slug,
            'kategori_id' => $this->request->getVar('kategori_id'), // Update ID
            'isi'         => $this->request->getVar('isi'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. DELETE (Tetap sama)
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