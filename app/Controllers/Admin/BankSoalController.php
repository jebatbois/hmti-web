<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BankSoalModel;

class BankSoalController extends BaseController
{
    protected $bankSoalModel;

    public function __construct()
    {
        $this->bankSoalModel = new BankSoalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Bank Soal & Arsip',
            'soal'  => $this->bankSoalModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/bank_soal/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Upload Soal Baru'];
        return view('admin/bank_soal/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'mata_kuliah'    => 'required',
            'semester'       => 'required|numeric',
            'jenis_ujian'    => 'required',
            'tahun_akademik' => 'required',
            'file_soal'      => [
                'rules' => 'uploaded[file_soal]|ext_in[file_soal,pdf,doc,docx]|max_size[file_soal,5120]', // Max 5MB, PDF/DOC
                'errors' => [
                    'uploaded' => 'Pilih file soal dulu.',
                    'ext_in'   => 'Hanya menerima file PDF atau Word.',
                    'max_size' => 'Ukuran file maksimal 5MB.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file_soal');
        $namaFile = $file->getRandomName();
        $file->move(FCPATH . 'uploads/bank_soal', $namaFile);

        $this->bankSoalModel->save([
            'mata_kuliah'    => $this->request->getVar('mata_kuliah'),
            'semester'       => $this->request->getVar('semester'),
            'jenis_ujian'    => $this->request->getVar('jenis_ujian'),
            'tahun_akademik' => $this->request->getVar('tahun_akademik'),
            'dosen'          => $this->request->getVar('dosen'),
            'file_soal'      => $namaFile
        ]);

        return redirect()->to('/admin/bank_soal')->with('success', 'Soal berhasil diupload!');
    }

    public function delete($id)
    {
        $soal = $this->bankSoalModel->find($id);
        
        $path = FCPATH . 'uploads/bank_soal/' . $soal['file_soal'];
        if (file_exists($path)) {
            unlink($path);
        }

        $this->bankSoalModel->delete($id);
        return redirect()->to('/admin/bank_soal')->with('success', 'Soal dihapus.');
    }
}