<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KomentarModel; 

class Berita extends BaseController
{
    protected $beritaModel;
    protected $komentarModel; 

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->komentarModel = new KomentarModel(); 
    }

       public function index()
    {
        $rawKeyword = $this->request->getGet('keyword');
        $keyword = null;

        if ($rawKeyword) {
            // Hapus karakter spesial, hanya izinkan huruf, angka, dan spasi
            // Regex: ^[a-zA-Z0-9 ] berarti selain itu akan dihapus
            $cleanKeyword = preg_replace('/[^a-zA-Z0-9 ]/', '', $rawKeyword);
            
            // Cek apakah setelah dibersihkan masih ada isinya
            if (!empty(trim($cleanKeyword))) {
                $keyword = $cleanKeyword;
            }
        }
        
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
            'keyword' => $keyword // Tampilkan keyword yang sudah dibersihkan di input
        ];

        return view('pages/berita_index', $data);
    }

    public function detail($slug)
    {
        $berita = $this->beritaModel->getBeritaLengkap()->where('slug', $slug)->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $terkait = $this->beritaModel->getBeritaLengkap()
                        ->where('berita.id !=', $berita['id']) 
                        ->orderBy('berita.created_at', 'DESC')
                        ->findAll(3);
        
        $komentar = $this->komentarModel->where('berita_id', $berita['id'])
                                        ->where('status', 'tampil') 
                                        ->orderBy('created_at', 'DESC')
                                        ->findAll();

        $data = [
            'title'    => $berita['judul'],
            'berita'   => $berita,
            'terkait'  => $terkait,
            'komentar' => $komentar, 
            'jumlah_komentar' => count($komentar)
        ];

        return view('pages/berita_detail', $data);
    }

    // Method Baru: Kirim Komentar (TANPA EMAIL)
    public function kirimKomentar()
    {
        if (!$this->validate([
            'nama' => 'required',
            // HAPUS validasi email
            'isi_komentar' => 'required',
            'berita_id' => 'required',
            'slug' => 'required' 
        ])) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengirim komentar. Nama dan Pesan wajib diisi.');
        }

        $this->komentarModel->save([
            'berita_id'    => $this->request->getVar('berita_id'),
            'nama'         => $this->request->getVar('nama'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'status'       => 'tampil' 
        ]);

        return redirect()->to('/berita/' . $this->request->getVar('slug'))->with('success', 'Komentar berhasil dikirim!');
    }
}