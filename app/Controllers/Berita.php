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

    // Halaman List Berita
    public function index()
    {
        $data = [
            'title' => 'Berita Terkini',
            // Pagination (Halaman) otomatis bawaan CI4
            'berita' => $this->beritaModel->orderBy('created_at', 'DESC')->paginate(6),
            'pager' => $this->beritaModel->pager,
        ];

        return view('pages/berita_index', $data);
    }

    // Halaman Detail Berita
    public function detail($slug)
    {
        $berita = $this->beritaModel->where('slug', $slug)->first();

        // Jika berita tidak ditemukan, tampilkan error 404
        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $berita['judul'],
            'berita' => $berita
        ];

        return view('pages/berita_detail', $data);
    }
}