<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengurusModel;

class PengurusController extends BaseController
{
    protected $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusModel();
    }

    // CEK AKSES: Method bantuan untuk memblokir Editor
    private function cekAksesAdmin()
    {
        if (session()->get('role') != 'admin') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Akses Ditolak. Hanya Admin yang boleh masuk sini.");
        }
    }

    // 1. READ (Daftar Pengurus)
    public function index()
    {
        $this->cekAksesAdmin(); // Proteksi

        $data = [
            'title'    => 'Manajemen Pengurus',
            'pengurus' => $this->pengurusModel->orderBy('urutan', 'ASC')->findAll()
        ];
        return view('admin/pengurus/index', $data);
    }

    // 2. CREATE (Form Tambah)
    public function create()
    {
        $this->cekAksesAdmin();
        $data = ['title' => 'Tambah Pengurus Baru'];
        return view('admin/pengurus/create', $data);
    }

    // 3. STORE (Simpan Data)
    public function store()
    {
        $this->cekAksesAdmin();

        if (!$this->validate([
            'nama'       => 'required',
            'jabatan'    => 'required',
            'departemen' => 'required',
            'urutan'     => 'required|numeric',
            'foto'       => [
                'rules' => 'permit_empty|is_image[foto]|ext_in[foto,png,jpg,jpeg]|max_size[foto,5120]', // Max 5MB
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'ext_in'   => 'Format gambar harus PNG, JPG, atau JPEG.',
                    'max_size' => 'Ukuran maksimal 5MB.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        
        // PERBAIKAN: Ganti hasError() dengan getError() == 0
        if ($fileFoto->isValid() && $fileFoto->getError() == 0) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'img/pengurus', $namaFoto);
        } else {
            $namaFoto = 'default.png'; 
        }

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

    // 4. EDIT (Form Edit)
    public function edit($id)
    {
        $this->cekAksesAdmin();
        $data = [
            'title'    => 'Edit Pengurus',
            'p'        => $this->pengurusModel->find($id)
        ];
        return view('admin/pengurus/edit', $data);
    }

    // 5. UPDATE (Simpan Perubahan)
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

        // PERBAIKAN: Ganti hasError() dengan getError() == 0
        if ($fileFoto->isValid() && $fileFoto->getError() == 0) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'img/pengurus', $namaFoto);

            // Hapus foto lama (kecuali default.png)
            if ($dataLama['foto'] != 'default.png' && file_exists(FCPATH . 'img/pengurus/' . $dataLama['foto'])) {
                unlink(FCPATH . 'img/pengurus/' . $dataLama['foto']);
            }
        } else {
            $namaFoto = $dataLama['foto'];
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

    // 6. DELETE (Hapus)
    public function delete($id)
    {
        $this->cekAksesAdmin();
        $p = $this->pengurusModel->find($id);

        // Hapus foto
        if ($p['foto'] != 'default.png' && file_exists(FCPATH . 'img/pengurus/' . $p['foto'])) {
            unlink(FCPATH . 'img/pengurus/' . $p['foto']);
        }

        $this->pengurusModel->delete($id);
        return redirect()->to('/admin/pengurus')->with('success', 'Pengurus dihapus.');
    }
}