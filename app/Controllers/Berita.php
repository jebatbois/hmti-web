<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    // Halaman List Berita + Pencarian
    public function index()
    {
        // 1. Ambil keyword dari URL (?keyword=...)
        $keyword = $this->request->getGet('keyword');

        // 2. Bangun Query
        // Kita manipulasi $this->beritaModel langsung sebelum memanggil paginate
        if ($keyword) {
            // Menggunakan groupStart() agar logika OR terisolasi dengan benar
            // SQL: WHERE (judul LIKE '%key%' OR isi LIKE '%key%')
            $this->beritaModel->groupStart()
                ->like('judul', $keyword)
                ->orLike('isi', $keyword)
            ->groupEnd();
        }

        $data = [
            'title'   => 'Berita & Kegiatan - HMTI FT-TM',
            // 3. Eksekusi query (filter di atas otomatis ikut tereksekusi di sini)
            'berita'  => $this->beritaModel->orderBy('created_at', 'DESC')->paginate(6, 'berita'),
            'pager'   => $this->beritaModel->pager,
            'keyword' => $keyword 
        ];

        return view('pages/berita_index', $data);
    }

    // Halaman Detail Berita (Tidak berubah)
    public function detail($slug)
    {
        // ... (kode detail biarkan tetap sama)
        $berita = $this->beritaModel->where('slug', $slug)->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'   => $berita['judul'],
            'berita'  => $berita,
            'terkait' => $this->beritaModel->where('id !=', $berita['id'])->orderBy('created_at', 'DESC')->findAll(3)
        ];

        return view('pages/berita_detail', $data);
    }
}