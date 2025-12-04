# 💻 HMTI FTTK UMRAH Official Website

✨ **Wadah Aspirasi, Kreasi, dan Inovasi Mahasiswa Teknik Informatika** ✨

Proyek ini adalah implementasi sistem informasi resmi untuk Himpunan Mahasiswa Teknik Informatika (HMTI) Fakultas Teknik dan Teknologi Kemaritiman (FTTK) Universitas Maritim Raja Ali Haji (UMRAH), dibangun menggunakan *framework* **CodeIgniter 4** dan **Tailwind CSS**.

---

## 🚀 Fitur Utama Proyek

* **🌐 Multi-Page Design:** Halaman Beranda, Profil Organisasi, Program Kerja, Berita/Kegiatan, Bank Soal, Mimbar Bebas, dan Kontak.
* **🎨 Dark Premium Theme:** Desain modern dengan skema warna Navy/Slate (gelap) yang konsisten di Navbar dan Footer.
* **🛠️ Module-Based Content:** Modul khusus untuk **Bank Soal** (Arsip Akademik) dan **Mimbar Bebas** (Wall of Aspirations).
* **🇮🇩 Multi-Language Ready:** Infrastruktur dasar untuk Lokalisasi (ID/EN) menggunakan fitur bawaan CI4 `lang()`.
* **⚙️ Responsive & Interactive:** Menggunakan Tailwind CSS untuk desain *mobile-first* dan interaksi modern (hover, shadow, animasi).

---

## 🛠️ Stack Teknologi

| Kategori | Teknologi | Versi Kunci | Catatan |
| :--- | :--- | :--- | :--- |
| **Backend** | **PHP** | 8.1+ | Diperlukan |
| **Framework** | **CodeIgniter 4** | ^4.x | Kerangka kerja utama |
| **Database** | **MySQL/MariaDB** | - | Digunakan untuk data Berita, Proker, Bank Soal, dan Komentar |
| **Frontend** | **Tailwind CSS** | ^3.x | Untuk styling dan desain |
| **Dependencies** | **Composer** | - | Untuk mengelola library PHP |

---

## ⚙️ Panduan Instalasi (Development)

Ikuti langkah-langkah ini untuk menjalankan proyek secara lokal:

### Prerequisites

Pastikan sistem Anda sudah terinstal:
1.  **PHP** (Versi 8.1 atau terbaru)
2.  **Composer**
3.  **MySQL/MariaDB**

### Langkah Setup

1.  **Clone Repository:**
    ```bash
    git clone https://github.com/jebatbois/hmti-web
    cd nama-folder-proyek
    ```

2.  **Install Dependencies:**
    Gunakan Composer untuk menginstal library CodeIgniter:
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment:**
    Salin file environment contoh ke file `.env`:
    ```bash
    cp .env.example .env
    ```

4.  **Atur File `.env`:**
    Buka file `.env` dan atur parameter berikut:
    * **baseURL:** Atur URL utama proyek Anda (`app.baseURL`).
    * **Database:** Isi kredensial database Anda (Nama DB, Username, Password).

    ```env
    #--------------------------------------------------------------------
    # Database
    #--------------------------------------------------------------------
    database.default.hostname = localhost
    database.default.database = nama_db_hmti
    database.default.username = user_db_anda
    database.default.password = password_anda
    database.default.DBDriver = MySQLi
    ```

5.  **Jalankan Migrasi Database:**
    Gunakan `spark` CLI untuk membuat tabel database secara otomatis (asumsi file migrasi sudah tersedia):
    ```bash
    php spark migrate
    ```

6.  **Jalankan Server Development:**
    ```bash
    php spark serve
    ```
    Akses proyek Anda di `http://localhost:8080`.

---

## 🎨 Detail Theming & Kustomisasi

Proyek ini dirancang menggunakan Tailwind CSS. Untuk memastikan semua warna kustom dan font berfungsi, proyek menggunakan **Tailwind CDN yang dikonfigurasi** di file `app/Views/layout/template.php`.

### 1. Palet Warna Kustom

Semua warna utama proyek (Hijau, Biru, Ungu) didefinisikan secara semantik di konfigurasi. Anda dapat menggunakannya langsung di View:

| Palet | Kegunaan | Contoh Class |
| :--- | :--- | :--- |
| `hmti` | **Brand Utama (Green)** | `bg-hmti-primary`, `text-hmti-dark` |
| `news` | **Berita / Navy** | `bg-news-dark`, `text-news-primary` |
| `academic` | **Bank Soal / Purple** | `bg-academic-primary`, `ring-academic-light` |
| `mimbar` | **Mimbar Bebas / Teal** | `bg-mimbar-primary`, `font-handwriting` |

### 2. Font Kustom

* **`font-sans`**: Menggunakan font **Inter** (Standard UI).
* **`font-handwriting`**: Menggunakan font **Patrick Hand** untuk efek tulisan tangan (khusus Mimbar Bebas).

### 3. Debugging Tailwind (Penting!)

Jika Anda mengubah kode atau menambahkan class dan warnanya tidak muncul (masih putih/transparan), pastikan Anda melakukan salah satu hal berikut:
1.  **Development:** Pastikan tag `<script src="https://cdn.tailwindcss.com"></script>` dan konfigurasi custom di **`template.php`** tidak dihapus atau terblokir.
2.  **Production:** Hapus CDN dan jalankan build Tailwind CLI secara penuh (`npx tailwindcss -i ... -o ...`).

---

## 🤝 Kontribusi

Kami menyambut kontribusi dan masukan dari komunitas mahasiswa.

1.  *Fork* repository ini.
2.  Buat branch baru (`git checkout -b feature/nama-fitur`).
3.  Lakukan *commit* (`git commit -m 'feat: menambahkan fitur X'`).
4.  *Push* ke branch Anda (`git push origin feature/nama-fitur`).
5.  Buat **Pull Request**.

---

## 📜 Lisensi

Proyek ini dilisensikan di bawah lisensi MIT.
