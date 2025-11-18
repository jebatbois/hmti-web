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
        $keyword = $this->request->getGet('keyword');
        
        // PENTING: Gunakan getBeritaLengkap() agar dapat nama & warna kategori
        $query = $this->beritaModel->getBeritaLengkap(); 

        if ($keyword) {
            $query->groupStart()
                ->like('judul', $keyword)
                ->orLike('isi', $keyword)
            ->groupEnd();
        }

        $data = [
            'title'   => 'Berita & Kegiatan - HMTI FT-TM',
            'berita'  => $query->orderBy('berita.created_at', 'DESC')->paginate(6, 'berita'),
            'pager'   => $this->beritaModel->pager,
            'keyword' => $keyword 
        ];

        return view('pages/berita_index', $data);
    }

    public function detail($slug)
    {
        // PENTING: Gunakan getBeritaLengkap() di sini juga
        $berita = $this->beritaModel->getBeritaLengkap()->where('slug', $slug)->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil berita terkait, juga dengan kategori lengkap
        $terkait = $this->beritaModel->getBeritaLengkap()
                        ->where('berita.id !=', $berita['id']) // Pastikan specify table 'berita.id'
                        ->orderBy('berita.created_at', 'DESC')
                        ->findAll(3);

        $data = [
            'title'   => $berita['judul'],
            'berita'  => $berita,
            'terkait' => $terkait
        ];

        return view('pages/berita_detail', $data);
    }
}