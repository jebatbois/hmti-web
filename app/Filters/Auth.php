<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // 1. Cek apakah sudah login
        if (! $session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Eits, login dulu sob!');
        }

        // 2. Cek Timeout (30 Menit Inaktif)
        // Ambil waktu aktivitas terakhir
        $lastActivity = $session->get('last_activity');
        $timeout = 1800; // 30 menit (dalam detik)

        if ($lastActivity && (time() - $lastActivity > $timeout)) {
            // Jika sudah lewat 30 menit sejak klik terakhir
            $session->destroy();
            return redirect()->to('/login')->with('error', 'Sesi habis karena tidak aktif. Silakan login kembali.');
        }

        // Update waktu aktivitas terakhir ke sekarang
        $session->set('last_activity', time());
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}