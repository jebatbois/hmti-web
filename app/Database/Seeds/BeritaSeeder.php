<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'      => 'HMTI Gelar Seminar Nasional: Masa Depan AI di Bidang Maritim',
                'slug'       => 'seminar-nasional-ai-maritim',
                'isi'        => 'Himpunan Mahasiswa Teknik Informatika (HMTI) UMRAH sukses menyelenggarakan Seminar Nasional bertajuk "Artificial Intelligence for Maritime Future". Acara ini dihadiri oleh ratusan mahasiswa dan menghadirkan pembicara ahli dari industri teknologi. Dalam seminar ini dibahas bagaimana Machine Learning dapat digunakan untuk memprediksi cuaca laut dan membantu nelayan di Kepulauan Riau.',
                'gambar'     => null, // Kita biarkan null agar pakai gambar default di View
                'created_at' => Time::now()->subDays(2)->toDateTimeString(), // 2 hari lalu
                'updated_at' => Time::now()->subDays(2)->toDateTimeString(),
            ],
            [
                'judul'      => 'HMTI Peduli: Bakti Sosial dan Bersih Pantai di Dompak',
                'slug'       => 'hmti-peduli-bersih-pantai',
                'isi'        => 'Sebagai wujud kepedulian terhadap lingkungan maritim, Departemen Pengabdian Masyarakat HMTI mengadakan aksi bersih pantai di sekitar jembatan Dompak. Kegiatan ini diikuti oleh seluruh anggota aktif dan berhasil mengumpulkan puluhan kantong sampah plastik. Ketua HMTI berharap kegiatan ini dapat meningkatkan kesadaran mahasiswa akan pentingnya menjaga ekosistem laut.',
                'gambar'     => null,
                'created_at' => Time::now()->subDays(5)->toDateTimeString(), // 5 hari lalu
                'updated_at' => Time::now()->subDays(5)->toDateTimeString(),
            ],
            [
                'judul'      => 'Welcoming Party & Makrab Angkatan 2025',
                'slug'       => 'welcoming-party-makrab-2025',
                'isi'        => 'Untuk menyambut keluarga baru, Divisi Kaderisasi menggelar Malam Keakraban (Makrab) bagi mahasiswa baru Teknik Informatika angkatan 2025. Acara berlangsung seru dengan api unggun, sharing session bersama alumni, dan pentas seni. Kegiatan ini bertujuan untuk mempererat tali persaudaraan antar angkatan di lingkungan Teknik Informatika UMRAH.',
                'gambar'     => null,
                'created_at' => Time::now()->subDays(10)->toDateTimeString(), // 10 hari lalu
                'updated_at' => Time::now()->subDays(10)->toDateTimeString(),
            ],
        ];

        // Insert data ke tabel berita
        $this->db->table('berita')->insertBatch($data);
    }
}