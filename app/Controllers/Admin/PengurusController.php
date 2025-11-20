<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengurusModel;

class PengurusController extends BaseController
{
    protected $pengurusModel;
    
    // STRUKTUR DINAMIS BERDASARKAN PERIODE
    protected function getStruktur($periode) {
        // PERIODE ARSIP (2024/2025) - SISTEM DIVISI LAMA
        if ($periode == '2024/2025') { 
            return [
                'Pengurus Inti' => [
                    'base_urutan' => 0,
                    'jabatan' => ['Ketua Himpunan', 'Wakil Ketua', 'Sekretaris Umum 1', 'Sekretaris Umum 2', 'Bendahara Umum 1', 'Bendahara Umum 2'],
                    'sub_divisi' => []
                ],
                'Divisi Organisasi dan Kaderisasi' => [
                    'base_urutan' => 10,
                    'jabatan' => ['Ketua Divisi', 'Sekretaris Divisi', 'Anggota'],
                    'sub_divisi' => []
                ],
                'Divisi Aspirasi, Minat dan Bakat' => [
                    'base_urutan' => 30,
                    'jabatan' => ['Ketua Divisi', 'Sekretaris Divisi', 'Anggota'],
                    'sub_divisi' => []
                ],
                'Divisi Penelitian, Pengembangan dan Pendidikan' => [
                    'base_urutan' => 50,
                    'jabatan' => ['Ketua Divisi', 'Sekretaris Divisi', 'Anggota'],
                    'sub_divisi' => []
                ],
                'Divisi Pers dan Informasi' => [
                    'base_urutan' => 70,
                    'jabatan' => ['Ketua Divisi', 'Sekretaris Divisi', 'Anggota'],
                    'sub_divisi' => []
                ],
                'Divisi Kewirausahaan' => [
                    'base_urutan' => 90,
                    'jabatan' => ['Ketua Divisi', 'Sekretaris Divisi', 'Anggota'],
                    'sub_divisi' => []
                ],
            ];
        } 
        
        // PERIODE SEKARANG (2025/2026) - SISTEM DEPARTEMEN BARU
        else { 
             return [
                'Pengurus Inti' => [
                    'base_urutan' => 0,
                    'jabatan' => [
                        'Ketua Himpunan', 
                        'Wakil Ketua', 
                        'Sekretaris Umum', 
                        'Sekretaris Umum 1', 
                        'Sekretaris Umum 2', 
                        'Bendahara Umum',
                        'Bendahara Umum 1',
                        'Bendahara Umum 2'
                    ],
                    'sub_divisi' => []
                ],
                'Departemen PPM' => [
                    'base_urutan' => 10,
                    'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Kepala Divisi', 'Staff'],
                    'sub_divisi' => [
                        'Divisi Pengembangan SDM & Kaderisasi',
                        'Divisi Hubungan & Relasi',
                        'Divisi Sosial & Pengabdian',
                        'Divisi Edukasi & Kepemimpinan'
                    ]
                ],
                'Departemen Kominfo' => [
                    'base_urutan' => 30,
                    'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Kepala Divisi', 'Staff'],
                    'sub_divisi' => [
                        'Divisi Pengembangan Sistem & Infrastruktur',
                        'Divisi Desain & Produksi Multimedia',
                        'Divisi Publikasi & Dokumentasi',
                        'Divisi Konten & Branding Digital'
                    ]
                ],
                'Departemen Litbang' => [
                    'base_urutan' => 50,
                    'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Kepala Divisi', 'Staff'],
                    'sub_divisi' => [
                        'Divisi Pelatihan & Akademik',
                        'Divisi Riset & Inovasi',
                        'Divisi Kompetisi & Prestasi'
                    ]
                ],
                'Departemen Kewirausahaan' => [
                    'base_urutan' => 70,
                    'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Kepala Divisi', 'Staff'],
                    'sub_divisi' => [
                        'Divisi Bisnis & Inovasi',
                    ]
                ],
                'Departemen Minat & Bakat' => [
                    'base_urutan' => 90,
                    'jabatan' => ['Kepala Departemen', 'Sekretaris Departemen', 'Kepala Divisi', 'Staff'],
                    'sub_divisi' => [
                        'Divisi Event & Kreativitas',
                    ]
                ],
            ];
        }
    }

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
            'pengurus' => $this->pengurusModel->orderBy('periode', 'DESC')->orderBy('urutan', 'ASC')->findAll()
        ];
        return view('admin/pengurus/index', $data);
    }

    public function create()
    {
        $this->cekAksesAdmin();
        $data = [
            'title' => 'Tambah Pengurus Baru',
            'struktur_2025' => $this->getStruktur('2024/2025'),
            'struktur_2026' => $this->getStruktur('2025/2026')
        ];
        return view('admin/pengurus/create', $data);
    }

    public function store()
    {
        $this->cekAksesAdmin();
        if (!$this->validate([
            'nama'       => 'required',
            'periode'    => 'required',
            'jabatan'    => 'required',
            'departemen' => 'required',
            'urutan'     => 'required|numeric',
            'foto'       => ['rules' => 'permit_empty|is_image[foto]|ext_in[foto,png,jpg,jpeg]|max_size[foto,5120]']
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = ($fileFoto->isValid() && $fileFoto->getError() == 0) ? $fileFoto->getRandomName() : 'default.png';
        
        if ($namaFoto != 'default.png') $fileFoto->move(FCPATH . 'img/pengurus', $namaFoto);

        $this->pengurusModel->save([
            'nama'       => $this->request->getVar('nama'),
            'periode'    => $this->request->getVar('periode'),
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
        $p = $this->pengurusModel->find($id);
        
        $data = [
            'title'    => 'Edit Pengurus',
            'p'        => $p,
            // Fix: Pass variable $struktur for the initial view rendering
            'struktur' => $this->getStruktur($p['periode']), 
            'struktur_2025' => $this->getStruktur('2024/2025'),
            'struktur_2026' => $this->getStruktur('2025/2026')
        ];
        return view('admin/pengurus/edit', $data);
    }

    public function update($id)
    {
        $this->cekAksesAdmin();
        
        if (!$this->validate([
            'nama'    => 'required',
            'periode' => 'required',
            'jabatan' => 'required',
            'urutan'  => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $dataLama = $this->pengurusModel->find($id);
        $namaFoto = $dataLama['foto'];

        if ($fileFoto->isValid() && $fileFoto->getError() == 0) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'img/pengurus', $namaFoto);
            if ($dataLama['foto'] != 'default.png' && file_exists(FCPATH . 'img/pengurus/' . $dataLama['foto'])) {
                unlink(FCPATH . 'img/pengurus/' . $dataLama['foto']);
            }
        }

        $this->pengurusModel->update($id, [
            'nama'       => $this->request->getVar('nama'),
            'periode'    => $this->request->getVar('periode'),
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