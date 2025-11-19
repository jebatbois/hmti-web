<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- HERO SECTION (SUDAH DIPERBAIKI SEBELUMNYA) -->
<section class="relative text-white overflow-hidden animated-gradient">
    <!-- ... (kode hero sama seperti sebelumnya) ... -->
    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-hmti-accent opacity-10 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

    <div class="container mx-auto px-6 pt-28 pb-16 md:pt-32 md:pb-20 relative z-10">
        <div class="flex flex-col-reverse md:flex-row items-center justify-center"> 
            
            <!-- Text Column -->
            <div class="w-full md:w-3/5 text-center md:text-left mt-8 md:mt-0">
                <span class="text-hmti-accent font-bold tracking-wider uppercase text-sm md:text-base mb-2 block">
                    Selamat Datang di Website Resmi
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                    Himpunan Mahasiswa<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-blue-200">
                        Teknik Informatika
                    </span>
                </h1>
                <p class="text-gray-100 text-lg md:text-xl mb-8 leading-relaxed max-w-xl mx-auto md:mx-0">
                    Wadah aspirasi dan kreasi mahasiswa Teknik Informatika Universitas Maritim Raja Ali Haji yang unggul, beretika, dan berwawasan kemaritiman.
                </p>
                
                <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                    <a href="/profil" class="bg-hmti-accent text-hmti-dark font-bold px-8 py-3 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition transform duration-300">
                        Tentang Kami
                    </a>
                    <a href="/berita" class="border-2 border-white text-white font-bold px-8 py-3 rounded-full hover:bg-white hover:text-hmti-primary transition duration-300">
                        Lihat Berita
                    </a>
                </div>
            </div>

            <!-- Logo Column -->
            <div class="w-full md:w-2/5 flex justify-center items-center py-8"> 
                <div class="relative">
                    <img src="/img/hmti.png" alt="Logo HMTI Besar" 
                         class="relative w-48 h-48 md:w-80 md:h-80 object-contain animate-bounce-slow filter drop-shadow-lg" style="border-radius: 50%;"> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-[calc(100%+1.3px)] h-10 md:h-16 text-white" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
    </div>
</section>

<!-- FEATURES SECTION (Tetap Sama) -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Fokus & Nilai Kami</h2>
            <div class="w-20 h-1 bg-hmti-primary mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition duration-300 text-center group">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-6 text-hmti-primary group-hover:bg-hmti-primary group-hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Teknologi</h3>
                <p class="text-gray-600">Mengembangkan hard skill mahasiswa dalam rekayasa perangkat lunak, jaringan, dan kecerdasan buatan.</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition duration-300 text-center group">
                <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-6 text-hmti-marine group-hover:bg-hmti-marine group-hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /> 
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Inovasi Maritim</h3>
                <p class="text-gray-600">Menerapkan teknologi informasi untuk memecahkan masalah di sektor kelautan dan kemaritiman.</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition duration-300 text-center group">
                <div class="w-16 h-16 mx-auto bg-yellow-100 rounded-full flex items-center justify-center mb-6 text-yellow-600 group-hover:bg-hmti-accent group-hover:text-hmti-dark transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Keluarga</h3>
                <p class="text-gray-600">Membangun ikatan persaudaraan yang solid antar sesama mahasiswa Informatika.</p>
            </div>
        </div>
    </div>
</section>

<!-- BERITA TERBARU (UPDATE BAGIAN INI) -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
                <div class="w-20 h-1 bg-hmti-marine mt-2 rounded-full"></div>
            </div>
            <a href="/berita" class="hidden md:inline-block text-hmti-primary font-semibold hover:text-hmti-dark transition">
                Lihat Semua Berita &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if(!empty($berita) && count($berita) > 0) : ?>
                <?php foreach($berita as $b) : ?>
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 flex flex-col h-full border border-gray-100">
                        <div class="h-48 bg-gray-200 relative overflow-hidden group">
                            <img src="<?= $b['gambar'] ? '/img/berita/' . $b['gambar'] : 'https://via.placeholder.com/400x250?text=HMTI+News' ?>" 
                                 alt="<?= $b['judul']; ?>" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            
                            <!-- LABEL DINAMIS DI SINI -->
                            <div class="absolute top-4 left-4">
                                <span class="<?= $b['warna_label'] ?? 'bg-hmti-primary'; ?> text-white text-xs px-3 py-1 rounded-full font-bold uppercase shadow-sm">
                                    <?= $b['nama_kategori'] ?? 'Umum'; ?>
                                </span>
                            </div>

                        </div>
                        
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="text-xs text-gray-500 mb-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <?= date('d F Y', strtotime($b['created_at'])); ?>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-hmti-primary transition">
                                <a href="/berita/<?= $b['slug']; ?>"><?= $b['judul']; ?></a>
                            </h3>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                <?= strip_tags(substr($b['isi'], 0, 100)); ?>...
                            </p>
                            <a href="/berita/<?= $b['slug']; ?>" class="mt-auto text-hmti-primary font-bold text-sm hover:text-hmti-dark flex items-center">
                                Baca Selengkapnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-span-3 text-center py-12 bg-white rounded-lg border border-dashed border-gray-300">
                    <p class="text-gray-500">Belum ada berita yang diposting.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-8 text-center md:hidden">
            <a href="/berita" class="btn bg-hmti-light text-hmti-primary font-bold py-3 px-6 rounded-lg w-full block">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(-5%); }
        50% { transform: translateY(5%); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 3s infinite ease-in-out;
    }
    /* Animated Gradient CSS sudah di input.css, tidak perlu ditulis ulang disini */
</style>

<?= $this->endSection(); ?>