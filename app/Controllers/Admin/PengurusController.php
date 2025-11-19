<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengurusModel;

class PengurusController extends BaseController
{
    protected $pengurusModel;
    
    // DATA STRUKTUR ORGANISASI (Updated)
    protected $struktur = [
        'Pengurus Inti' => [
            'base_urutan' => 0,
            'jabatan' => ['Ketua Himpunan', 'Wakil Ketua', 'Sekretaris Umum 1', 'Sekretaris Umum 2', 'Bendahara Umum 1', 'Bendahara Umum 2'],
            'sub_divisi' => []
        ],
        'Departemen PPM' => [
            'base_urutan' => 10, 
            // Ubah Koordinator -> Kepala Departemen
            'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Staff Ahli', 'Staff'],
            'sub_divisi' => ['Divisi Kaderisasi', 'Divisi Pengabdian Masyarakat', 'Divisi Hubungan Luar']
        ],
        'Departemen Minat & Bakat' => [
            'base_urutan' => 30,
            'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Staff Ahli', 'Staff'],
            'sub_divisi' => ['Divisi Olahraga', 'Divisi Seni & Musik', 'Divisi E-Sport']
        ],
        // Ubah MTI -> Kominfo
        'Departemen Kominfo' => [
            'base_urutan' => 50, 
            'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Staff Ahli', 'Staff'],
            'sub_divisi' => ['Divisi Multimedia', 'Divisi Pemrograman', 'Divisi Jaringan']
        ],
        'Departemen Litbang' => [
            'base_urutan' => 70,
            'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Staff Ahli', 'Staff'],
            'sub_divisi' => ['Divisi Riset', 'Divisi Kompetisi']
        ],
        'Departemen Kewirausahaan' => [
            'base_urutan' => 90,
            'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Staff Ahli', 'Staff'],
            'sub_divisi' => ['Divisi Usaha Dana', 'Divisi Merchandise']
        ],
    ];

    public function __construct()
    {
        $this->pengurusModel = new PengurusModel();
    }

    private function cekAksesAdmin()
    {
        if (session()->get('role') != 'admin') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Akses Ditolak.");
        }
    }

    public function index()
    {
        $this->cekAksesAdmin();
        $data = [
            'title'    => 'Manajemen Pengurus',
            'pengurus' => $this->pengurusModel->orderBy('urutan', 'ASC')->findAll()
        ];
        return view('admin/pengurus/index', $data);
    }

    public function create()
    {
        $this->cekAksesAdmin();
        $data = [
            'title' => 'Tambah Pengurus Baru',
            'struktur' => $this->struktur
        ];
        return view('admin/pengurus/create', $data);
    }

    public function store()
    {
        $this->cekAksesAdmin();
        if (!$this->validate([
            'nama'       => 'required',
            'jabatan'    => 'required',
            'departemen' => 'required',
            'urutan'     => 'required|numeric',
            'foto'       => ['rules' => 'permit_empty|is_image[foto]|ext_in[foto,png,jpg,jpeg]|max_size[foto,5120]']
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = ($fileFoto->isValid() && !$fileFoto->hasError()) ? $fileFoto->getRandomName() : 'default.png';
        
        if ($namaFoto != 'default.png') $fileFoto->move(FCPATH . 'img/pengurus', $namaFoto);

        $this->pengurusModel->save([
            'nama'       => $this->request->getVar('nama'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'departemen' => $this->request->getVar('departemen'),
            'sub_divisi' => $this->request->getVar('sub_divisi'),
            'angkatan'   => $this->request->getVar('angkatan'),
            'urutan'     => $this->request->getVar('urutan'),
            'foto'       => $namaFoto
        ]);

        return redirect()->to('/admin/pengurus')->with('success', 'Pengurus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->cekAksesAdmin();
        $data = [
            'title'    => 'Edit Pengurus',
            'p'        => $this->pengurusModel->find($id),
            'struktur' => $this->struktur
        ];
        return view('admin/pengurus/edit', $data);
    }

    public function update($id)
    {
        $this->cekAksesAdmin();
        
        if (!$this->validate([
            'nama'    => 'required',
            'jabatan' => 'required',
            'urutan'  => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $dataLama = $this->pengurusModel->find($id);
        $namaFoto = $dataLama['foto'];

        if ($fileFoto->isValid() && !$fileFoto->hasError()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'img/pengurus', $namaFoto);
            if ($dataLama['foto'] != 'default.png' && file_exists(FCPATH . 'img/pengurus/' . $dataLama['foto'])) {
                unlink(FCPATH . 'img/pengurus/' . $dataLama['foto']);
            }
        }

        $this->pengurusModel->update($id, [
            'nama'       => $this->request->getVar('nama'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'departemen' => $this->request->getVar('departemen'),
            'sub_divisi' => $this->request->getVar('sub_divisi'),
            'angkatan'   => $this->request->getVar('angkatan'),
            'urutan'     => $this->request->getVar('urutan'),
            'foto'       => $namaFoto
        ]);

        return redirect()->to('/admin/pengurus')->with('success', 'Data pengurus diperbarui!');
    }

    public function delete($id)
    {
        $this->cekAksesAdmin();
        $p = $this->pengurusModel->find($id);
        if ($p['foto'] != 'default.png' && file_exists(FCPATH . 'img/pengurus/' . $p['foto'])) {
            unlink(FCPATH . 'img/pengurus/' . $p['foto']);
        }
        $this->pengurusModel->delete($id);
        return redirect()->to('/admin/pengurus')->with('success', 'Pengurus dihapus.');
    }
}