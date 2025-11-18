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

    public function index()
    {
        $data = [
            'title' => 'Berita & Kegiatan - HMTI FT-TM',
            // Tampilkan 6 berita per halaman
            'berita' => $this->beritaModel->orderBy('created_at', 'DESC')->paginate(6, 'berita'),
            'pager' => $this->beritaModel->pager,
        ];

        return view('pages/berita_index', $data);
    }

    public function detail($slug)
    {
        $berita = $this->beritaModel->where('slug', $slug)->first();

        // Jika berita tidak ditemukan, tampilkan error 404
        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $berita['judul'],
            'berita' => $berita,
            // Mengambil 3 berita lain untuk rekomendasi di sidebar
            'terkait' => $this->beritaModel->where('id !=', $berita['id'])->orderBy('created_at', 'DESC')->findAll(3)
        ];

        return view('pages/berita_detail', $data);
    }
}