<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah session role ada dan nilainya 'admin'
        if (session()->get('role') !== 'admin') {
            // Jika bukan admin (misal: editor), kembalikan ke dashboard
            return redirect()->to('/admin/dashboard')->with('error', 'Akses Ditolak! Anda tidak memiliki izin Administrator.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada yang perlu dilakukan setelah request
    }
}