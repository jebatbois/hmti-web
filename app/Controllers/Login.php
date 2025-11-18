<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // Kita perlu buat model ini sebentar lagi

class Login extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar langsung ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('login');
    }

    public function auth()
    {
        $session = session();
        // Kita pakai query manual builder dulu karena belum buat UserModel
        // Nanti sebaiknya buat UserModel
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        // Cari user berdasarkan username
        $data = $builder->where('username', $username)->get()->getRowArray();

        if ($data) {
            // Verifikasi password hash
            if (password_verify($password, $data['password'])) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username' => $data['username'],
                    'nama'     => $data['nama_lengkap'],
                    'role'     => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah, coba ingat-ingat lagi.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}