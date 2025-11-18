<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProkerModel;

class ProkerController extends BaseController
{
    protected $prokerModel;

    public function __construct()
    {
        $this->prokerModel = new ProkerModel();
    }

    // 1. READ (Tidak berubah)
    public function index()
    {
        $data = [
            'title'  => 'Program Kerja HMTI',
            'proker' => $this->prokerModel->orderBy('tanggal_pelaksanaan', 'ASC')->findAll()
        ];
        return view('admin/proker/index', $data);
    }

    // 2. CREATE (Tidak berubah)
    public function create()
    {
        $data = ['title' => 'Tambah Program Kerja'];
        return view('admin/proker/create', $data);
    }

    // 3. STORE (Ditambah logika upload foto)
    public function store()
    {
        // Validasi, tambah aturan untuk 'foto'
        if (!$this->validate([
            'nama_program' => 'required',
            'departemen'   => 'required',
            'status'       => 'required',
            'foto'         => [
                'rules'  => 'permit_empty|is_image[foto]|ext_in[foto,png,jpg,jpeg,webp]|max_size[foto,5120]', // Max 5MB
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'ext_in'   => 'Format gambar harus PNG, JPG, JPEG, atau WebP.',
                    'max_size' => 'Ukuran maksimal 5MB.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = 'default_proker.jpg'; // Default jika tidak ada upload atau gagal

        // Logika Upload Foto
        if ($fileFoto->isValid() && $fileFoto->getError() == 0) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'img/proker', $namaFoto);
        }

        $this->prokerModel->save([
            'nama_program'        => $this->request->getVar('nama_program'),
            'departemen'          => $this->request->getVar('departemen'),
            'deskripsi'           => $this->request->getVar('deskripsi'),
            'foto'                => $namaFoto, // Simpan nama foto
            'status'              => $this->request->getVar('status'),
            'tanggal_pelaksanaan' => $this->request->getVar('tanggal_pelaksanaan'),
        ]);

        return redirect()->to('/admin/proker')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    // 4. EDIT (Tidak berubah)
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Program Kerja',
            'proker' => $this->prokerModel->find($id)
        ];
        return view('admin/proker/edit', $data);
    }

    // 5. UPDATE (Ditambah logika update/ganti foto)
    public function update($id)
    {
        // Validasi, tambah aturan untuk 'foto'
        if (!$this->validate([
            'nama_program' => 'required',
            'departemen'   => 'required',
            'status'       => 'required',
            'foto'         => [
                'rules'  => 'permit_empty|is_image[foto]|ext_in[foto,png,jpg,jpeg,webp]|max_size[foto,5120]', // Max 5MB
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'ext_in'   => 'Format gambar harus PNG, JPG, JPEG, atau WebP.',
                    'max_size' => 'Ukuran maksimal 5MB.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $dataLama = $this->prokerModel->find($id);
        $namaFoto = $dataLama['foto']; // Default: gunakan foto lama

        // Logika Update Foto Baru
        if ($fileFoto->isValid() && $fileFoto->getError() == 0) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'img/proker', $namaFoto);

            // Hapus foto lama jika bukan default dan ada di server
            if ($dataLama['foto'] != 'default_proker.jpg' && file_exists(FCPATH . 'img/proker/' . $dataLama['foto'])) {
                unlink(FCPATH . 'img/proker/' . $dataLama['foto']);
            }
        }

        $this->prokerModel->update($id, [
            'nama_program'        => $this->request->getVar('nama_program'),
            'departemen'          => $this->request->getVar('departemen'),
            'deskripsi'           => $this->request->getVar('deskripsi'),
            'foto'                => $namaFoto, // Update nama foto
            'status'              => $this->request->getVar('status'),
            'tanggal_pelaksanaan' => $this->request->getVar('tanggal_pelaksanaan'),
        ]);

        return redirect()->to('/admin/proker')->with('success', 'Program kerja diperbarui!');
    }

    // 6. DELETE (Ditambah logika hapus foto)
    public function delete($id)
    {
        $p = $this->prokerModel->find($id);

        // Hapus foto terkait jika bukan default
        if ($p['foto'] != 'default_proker.jpg' && file_exists(FCPATH . 'img/proker/' . $p['foto'])) {
            unlink(FCPATH . 'img/proker/' . $p['foto']);
        }

        $this->prokerModel->delete($id);
        return redirect()->to('/admin/proker')->with('success', 'Program kerja dihapus.');
    }
}