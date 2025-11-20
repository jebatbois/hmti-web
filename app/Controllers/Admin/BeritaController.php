<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;

class BeritaController extends BaseController
{
    protected $beritaModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
    }

    // 1. READ (List Berita)
    public function index()
    {
        $data = [
            'title'  => 'Manajemen Berita',
            'berita' => $this->beritaModel->getBeritaLengkap()->orderBy('berita.created_at', 'DESC')->findAll()
        ];
        return view('admin/berita/index', $data);
    }

    // 2. CREATE (Form Tambah)
    public function create()
    {
        $data = [
            'title' => 'Tulis Berita Baru',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/berita/create', $data);
    }

    // 3. STORE (Proses Simpan)
    public function store()
    {
        // VALIDASI LENGKAP
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Judul berita wajib diisi.',
                    'min_length' => 'Judul terlalu pendek (minimal 10 karakter).'
                ]
            ],
            'isi' => [
                'rules' => 'required|min_length[50]',
                'errors' => [
                    'required' => 'Isi berita wajib diisi.',
                    'min_length' => 'Isi berita terlalu singkat (minimal 50 karakter).'
                ]
            ],
            'kategori_id' => [
                'rules' => 'required', // Hapus is_not_unique sementara jika bikin ribet, required sudah cukup
                'errors' => [
                    'required' => 'Kategori berita wajib dipilih.'
                ]
            ],
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
            'kategori_id' => $this->request->getVar('kategori_id'),
            'isi'         => $this->request->getVar('isi'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 4. EDIT (Form Edit)
    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Berita',
            'berita'   => $this->beritaModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/berita/edit', $data);
    }

    // 5. UPDATE (Proses Update)
    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Judul berita wajib diisi.',
                    'min_length' => 'Judul terlalu pendek (minimal 10 karakter).'
                ]
            ],
            'isi' => [
                'rules' => 'required|min_length[50]',
                'errors' => [
                    'required' => 'Isi berita wajib diisi.',
                    'min_length' => 'Isi berita terlalu singkat (minimal 50 karakter).'
                ]
            ],
            'kategori_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori berita wajib dipilih.'
                ]
            ],
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
            'kategori_id' => $this->request->getVar('kategori_id'),
            'isi'         => $this->request->getVar('isi'),
            'gambar'      => $namaGambar
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