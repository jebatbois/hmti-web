<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden text-white"
         style="background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);"> <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 opacity-20 rounded-full blur-3xl translate-y-1/2 translate-x-1/3"></div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <nav class="flex text-sm font-medium text-blue-200 mb-6">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <span class="mx-2">/</span>
            <a href="/berita" class="hover:text-white transition">Kabar Informatika</a>
            <span class="mx-2">/</span>
            <span class="text-white truncate max-w-[150px] md:max-w-md opacity-80">Baca Berita</span>
        </nav>

        <div class="max-w-4xl">
            <div class="flex flex-wrap gap-3 mb-6">
                <span class="bg-white/10 backdrop-blur-md border border-white/20 text-blue-200 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">
                    <?= $berita['nama_kategori'] ?? 'Berita Utama'; ?>
                </span>
                <span class="bg-blue-600 text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest flex items-center gap-2 shadow-lg">
                    <i class="far fa-calendar-alt"></i> <?= date('d F Y', strtotime($berita['created_at'])); ?>
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-6 drop-shadow-lg">
                <?= $berita['judul']; ?>
            </h1>

            <div class="flex items-center gap-4 text-blue-100">
                <div class="flex items-center gap-3 bg-white/10 px-5 py-3 rounded-xl border border-white/10 backdrop-blur-sm">
                    <div class="w-8 h-8 rounded-full bg-white text-blue-900 flex items-center justify-center font-bold text-xs shadow-sm">
                        <?= strtoupper(substr($berita['penulis'] ?? 'A', 0, 1)); ?>
                    </div>
                    <span class="font-bold text-sm md:text-base">
                        <?= $berita['penulis'] ?? 'Admin HMTI'; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="bg-gray-50 min-h-screen pb-24 relative z-20 -mt-12">
    <div class="container mx-auto px-4 md:px-8">
        
        <div class="flex flex-col lg:flex-row gap-10">
            
            <div class="w-full lg:w-8/12">
                
                <div class="mb-10 p-2 bg-white rounded-2xl shadow-xl">
                    <div class="rounded-xl overflow-hidden relative h-auto group">
                        <div class="absolute inset-0 bg-blue-900/10 group-hover:bg-transparent transition duration-500 z-10"></div>
                        <img src="<?= $berita['gambar'] ? '/img/berita/' . $berita['gambar'] : 'https://via.placeholder.com/800x450?text=HMTI+News' ?>" 
                             alt="<?= $berita['judul']; ?>" 
                             class="w-full h-auto object-cover hover:scale-105 transition duration-700 ease-in-out">
                    </div>
                </div>

                <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-16 -mt-16 opacity-60"></div>
                    
                    <article class="prose prose-lg prose-slate max-w-none text-gray-700 leading-loose text-justify relative z-10">
                        <span class="float-left text-5xl font-bold text-news-primary mr-3 mt-[-8px] font-serif">
                            <?= substr(strip_tags($berita['isi']), 0, 1); ?>
                        </span>
                        <?= nl2br(substr($berita['isi'], 1)); ?>
                    </article>

                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                            <span class="text-sm font-bold text-gray-400 uppercase tracking-wide">Bagikan Artikel:</span>
                            <div class="flex gap-3">
                                <button class="w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition flex items-center justify-center shadow-md"><i class="fab fa-facebook-f"></i></button>
                                <button class="w-10 h-10 rounded-full bg-sky-500 text-white hover:bg-sky-600 transition flex items-center justify-center shadow-md"><i class="fab fa-twitter"></i></button>
                                <button class="w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition flex items-center justify-center shadow-md"><i class="fab fa-whatsapp"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="h-8 w-1.5 bg-news-primary rounded-full"></div>
                        <h3 class="text-2xl font-bold text-gray-800">Diskusi (<?= $jumlah_komentar; ?>)</h3>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-10 relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-5"><i class="fas fa-comments text-6xl text-news-primary"></i></div>
                        
                        <?php if(session()->getFlashdata('success')) : ?>
                            <div class="bg-green-50 text-green-700 p-3 rounded-lg mb-4 text-sm border border-green-200 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/berita/kirim_komentar" method="post">
                            <input type="hidden" name="berita_id" value="<?= $berita['id']; ?>">
                            <input type="hidden" name="slug" value="<?= $berita['slug']; ?>">

                            <div class="mb-4">
                                <input type="text" name="nama" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-news-primary focus:ring-4 focus:ring-blue-50 transition" placeholder="Nama Lengkap (Wajib)" required>
                            </div>
                            <div class="mb-4">
                                <textarea name="isi_komentar" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl h-32 focus:bg-white focus:outline-none focus:border-news-primary focus:ring-4 focus:ring-blue-50 transition resize-none" placeholder="Tulis pendapat Anda..." required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="bg-news-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-news-hover transition shadow-lg transform active:scale-95 flex items-center justify-center ml-auto">
                                    <span>Kirim Komentar</span>
                                    <i class="fas fa-paper-plane ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="space-y-6">
                        <?php if(empty($komentar)): ?>
                            <div class="text-center py-12 bg-white/50 rounded-2xl border-2 border-dashed border-gray-200">
                                <p class="text-gray-400">Belum ada komentar. Jadilah yang pertama!</p>
                            </div>
                        <?php else: ?>
                            <?php foreach($komentar as $k): ?>
                                <div class="flex gap-4 group">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold text-sm shadow-md border-2 border-white group-hover:scale-110 transition">
                                        <?= strtoupper(substr($k['nama'], 0, 1)); ?>
                                    </div>
                                    <div class="bg-white p-5 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 flex-grow hover:shadow-md transition">
                                        <div class="flex justify-between items-center mb-2">
                                            <h5 class="font-bold text-gray-900 text-sm"><?= esc($k['nama']); ?></h5>
                                            <span class="text-[10px] text-gray-400 font-mono bg-gray-100 px-2 py-0.5 rounded"><?= date('d M, H:i', strtotime($k['created_at'])); ?></span>
                                        </div>
                                        <p class="text-gray-600 text-sm leading-relaxed"><?= nl2br(esc($k['isi_komentar'])); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-200">
                    <a href="/berita" class="inline-flex items-center font-bold text-gray-500 hover:text-news-primary transition group">
                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center mr-3 group-hover:bg-blue-100 group-hover:text-news-primary transition">
                            <i class="fas fa-arrow-left text-xs group-hover:-translate-x-0.5 transition"></i>
                        </div>
                        Kembali ke Kabar Informatika
                    </a>
                </div>

            </div>

            <div class="w-full lg:w-4/12">
                <div class="sticky top-24 space-y-8 mt-12 lg:mt-24">
                    
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-news-dark border-b border-gray-800">
                            <h3 class="text-white font-bold flex items-center gap-2 text-sm uppercase tracking-wider">
                                <i class="fas fa-newspaper text-blue-400"></i> Berita Lainnya
                            </h3>
                        </div>
                        
                        <div class="divide-y divide-gray-100">
                            <?php foreach($terkait as $t) : ?>
                            <a href="/berita/<?= $t['slug']; ?>" class="flex gap-4 p-4 hover:bg-blue-50 transition group">
                                <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden bg-gray-200 relative border border-gray-200">
                                    <img src="<?= $t['gambar'] ? '/img/berita/' . $t['gambar'] : 'https://via.placeholder.com/100?text=Img' ?>" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <span class="text-[9px] font-bold uppercase text-blue-500 bg-blue-100 px-1.5 py-0.5 rounded mb-1 inline-block">
                                        <?= $t['nama_kategori'] ?? 'INFO'; ?>
                                    </span>
                                    <h4 class="text-sm font-bold text-gray-800 leading-snug mb-1 group-hover:text-news-primary transition line-clamp-2">
                                        <?= $t['judul']; ?>
                                    </h4>
                                    <span class="text-xs text-gray-400 flex items-center gap-1">
                                        <i class="far fa-clock text-[10px]"></i>
                                        <?= date('d M Y', strtotime($t['created_at'])); ?>
                                    </span>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="p-4 bg-gray-50 text-center border-t border-gray-200">
                            <a href="/berita" class="text-xs font-bold text-news-primary hover:text-news-hover hover:underline uppercase tracking-wide">
                                Lihat Indeks Berita
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>