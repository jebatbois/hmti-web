<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    

    // 1. List Semua User
    public function index()
    {
        $data = [
            'title' => 'Manajemen Pengguna',
            'users' => $this->userModel->findAll()
        ];
        return view('admin/user/index', $data);

        if (session()->get('role') != 'admin') {
        return redirect()->to('/admin/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
    }
        
    }

    // 2. Tampilkan Form Tambah
    public function create()
    {
        $data = ['title' => 'Tambah Pengguna Baru'];
        return view('admin/user/create', $data);
    }

public function store()
    {
        // Validasi Input
        if (!$this->validate([
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'nama'     => 'required',
            'role'     => 'required|in_list[admin,editor]' // Validasi tambahan keamanan
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan ke Database
        $this->userModel->save([
            'username'     => $this->request->getVar('username'),
            'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getVar('nama'),
            'role'         => $this->request->getVar('role'), // <--- Role Disimpan Disini
        ]);

        return redirect()->to('/admin/users')->with('success', 'User berhasil ditambahkan!');
    }

    // 4. Hapus User
    public function delete($id)
    {
        // Cegah hapus akun sendiri yang sedang login
        if(session()->get('id') == $id) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $this->userModel->delete($id);
        return redirect()->to('/admin/users')->with('success', 'User berhasil dihapus.');
    }
}