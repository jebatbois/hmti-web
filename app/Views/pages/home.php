<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-20 pb-16 md:pt-32 md:pb-48 overflow-hidden text-white"
         style="background-color: #0b121e;"> 
    
    <!-- Efek Blur 1: Disembunyikan pada mobile (hidden) dan hanya muncul di md: ke atas (md:block) -->
    <div class="hidden md:block absolute top-0 right-0 w-[600px] h-[600px] bg-green-600/20 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
    
    <!-- Efek Blur 2: Disembunyikan pada mobile (hidden) dan hanya muncul di md: ke atas (md:block) -->
    <div class="hidden md:block absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>
    
    <div class="absolute inset-0 bg-[url('/img/pattern.png')] opacity-5 mix-blend-overlay"></div>

    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="flex flex-col-reverse lg:flex-row items-center gap-3 md:gap-12 lg:gap-20">
            
            <div class="w-full lg:w-6/12 text-center lg:text-left">
                <span class="inline-block py-1 px-3 rounded-full bg-green-900/50 border border-green-500/30 text-green-400 text-xs font-bold uppercase tracking-widest mb-3 md:mb-6 backdrop-blur-md">
                    🚀 Welcome to HMTI Official
                </span>
                
                <h1 class="text-2xl sm:text-3xl md:text-6xl font-extrabold leading-snug mb-3 md:mb-6 tracking-tight">
                    Mewujudkan <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                        Generasi Digital
                    </span>
                    <br> Yang Berintegritas.
                </h1>
                
                <p class="text-gray-400 text-xs md:text-lg mb-5 md:mb-8 leading-snug md:leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Wadah aspirasi dan kreasi mahasiswa Teknik Informatika UMRAH untuk mencetak pemimpin masa depan yang unggul di bidang teknologi.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center lg:justify-start">
                    <a href="/profil" class="px-6 md:px-8 py-3 md:py-4 rounded-full bg-green-600 hover:bg-green-500 text-white font-bold transition shadow-lg hover:shadow-green-500/25 transform hover:-translate-y-1 text-sm md:text-base">
                        Tentang Kami
                    </a>
                    <a href="/berita" class="px-6 md:px-8 py-3 md:py-4 rounded-full border border-gray-600 hover:border-white text-gray-300 hover:text-white font-bold transition hover:bg-white/5 text-sm md:text-base">
                        Lihat Berita
                    </a>
                </div>
            </div>

            <!-- Desktop Image -->
            <div class="hidden lg:flex w-full lg:w-6/12 justify-center relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-green-500/20 to-blue-500/20 rounded-full blur-3xl"></div>
                
                <img src="/img/hmti.png" alt="HMTI UMRAH" 
                     class="relative w-96 h-96 object-contain drop-shadow-2xl filter hover:brightness-110 transition duration-500 animate-bounce-slow">
            </div>
        </div>
    </div>

    <!-- Mobile Image -->
    <div class="lg:hidden flex justify-center mb-2">
        <img src="/img/hmti.png" alt="HMTI UMRAH" 
             class="w-36 h-36 object-contain drop-shadow-lg filter">
    </div>
    
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-8 md:h-24 text-gray-50" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="min-width: 100%;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="currentColor"></path>
        </svg>
    </div>
</section>

<section class="relative z-20 -mt-6 md:-mt-16 px-4 md:px-6 pt-2">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-6">
            
            <a href="/bank-soal" class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300 group flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl group-hover:bg-purple-600 group-hover:text-white transition">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 group-hover:text-purple-700 transition">Bank Soal</h3>
                    <p class="text-xs text-gray-500">Arsip UTS, UAS & Materi</p>
                </div>
            </a>

            <a href="/mimbar" class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300 group flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-2xl group-hover:bg-teal-600 group-hover:text-white transition">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 group-hover:text-teal-700 transition">Mimbar Bebas</h3>
                    <p class="text-xs text-gray-500">Sampaikan aspirasimu</p>
                </div>
            </a>

            <a href="/kontak" class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300 group flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-2xl group-hover:bg-green-600 group-hover:text-white transition">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 group-hover:text-green-700 transition">Hubungi Kami</h3>
                    <p class="text-xs text-gray-500">Kritik, Saran & Kerjasama</p>
                </div>
            </a>

        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-6">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Kenapa HMTI?</h2>
            <div class="h-1 w-20 bg-green-500 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600">Nilai-nilai dasar yang menjadi fondasi pergerakan kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:border-green-200 transition duration-300 group text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-green-50 text-green-600 flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition">
                    <i class="fas fa-code"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Teknologi</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Pengembangan skill rekayasa perangkat lunak, jaringan, dan AI yang adaptif.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:border-blue-200 transition duration-300 group text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Inovasi</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Solusi kreatif berbasis teknologi untuk tantangan kemaritiman dan masyarakat.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:border-yellow-200 transition duration-300 group text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Keluarga</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Rumah bagi setiap mahasiswa Informatika untuk tumbuh dan berkembang bersama.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white relative">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50 skew-x-12 opacity-50 pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Kabar Terbaru</h2>
                <p class="text-gray-500 mt-2">Update kegiatan dan prestasi terkini.</p>
            </div>
            <a href="/berita" class="hidden md:inline-flex items-center font-bold text-blue-700 hover:text-blue-900 transition">
                Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if(!empty($berita) && count($berita) > 0) : ?>
                <?php foreach($berita as $b) : ?>
                    <article class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full group">
                        <a href="/berita/<?= $b['slug']; ?>" class="h-52 overflow-hidden relative block">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition z-10"></div>
                            
                            <span class="absolute top-4 left-4 z-20 bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-sm">
                                <?= $b['nama_kategori'] ?? 'INFO'; ?>
                            </span>

                            <img src="<?= $b['gambar'] ? '/img/berita/' . $b['gambar'] : 'https://via.placeholder.com/400x250?text=HMTI+News' ?>" 
                                 alt="<?= $b['judul']; ?>" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        </a>
                        
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="text-xs text-gray-400 mb-3 flex items-center">
                                <i class="far fa-clock mr-2"></i> <?= date('d M Y', strtotime($b['created_at'])); ?>
                            </div>
                            
                            <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-700 transition line-clamp-2">
                                <a href="/berita/<?= $b['slug']; ?>"><?= $b['judul']; ?></a>
                            </h3>
                            
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
                                <?= strip_tags(substr($b['isi'], 0, 100)); ?>...
                            </p>
                            
                            <a href="/berita/<?= $b['slug']; ?>" class="text-sm font-bold text-blue-600 hover:underline mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-span-3 py-12 text-center border-2 border-dashed border-gray-200 rounded-xl">
                    <p class="text-gray-400">Belum ada berita terbaru.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-8 text-center md:hidden">
            <a href="/berita" class="btn w-full py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>