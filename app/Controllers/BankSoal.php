<?php

namespace App\Controllers;

use App\Models\BankSoalModel;

class BankSoal extends BaseController
{
    protected $bankSoalModel;

    public function __construct()
    {
        $this->bankSoalModel = new BankSoalModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $semester = $this->request->getGet('semester');

        $query = $this->bankSoalModel;

        if ($keyword) {
            $query->like('mata_kuliah', $keyword)->orLike('dosen', $keyword);
        }

        if ($semester) {
            $query->where('semester', $semester);
        }

        $data = [
            'title' => 'Bank Soal Informatika',
            'soal'  => $query->orderBy('created_at', 'DESC')->paginate(10, 'bank_soal'),
            'pager' => $this->bankSoalModel->pager,
            'keyword' => $keyword,
            'semester' => $semester
        ];

        return view('pages/bank_soal', $data);
    }
}