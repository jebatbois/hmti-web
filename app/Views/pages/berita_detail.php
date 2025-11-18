<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="bg-gray-100 py-4 pt-24 border-b">
    <div class="container mx-auto px-6">
        <div class="text-sm text-gray-500">
            <a href="/" class="hover:text-hmti-primary">Beranda</a> 
            <span class="mx-2">/</span> 
            <a href="/berita" class="hover:text-hmti-primary">Berita</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium truncate"><?= substr($berita['judul'], 0, 30); ?>...</span>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        
        <!-- KONTEN UTAMA (Kiri) --><div class="w-full lg:w-2/3">
            <!-- Label Kategori --><span class="<?= $berita['warna_label'] ?? 'bg-gray-500'; ?> text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wide mb-3 inline-block">
                <?= $berita['nama_kategori'] ?? 'Umum'; ?>
            </span>

            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                <?= $berita['judul']; ?>
            </h1>
            
            <div class="flex items-center text-gray-500 text-sm mb-8 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <?= date('d F Y', strtotime($berita['created_at'])); ?>
                </span>
                <span class="flex items-center text-hmti-primary font-semibold">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    Admin HMTI
                </span>
            </div>

            <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                <img src="<?= $berita['gambar'] ? '/img/berita/' . $berita['gambar'] : 'https://via.placeholder.com/800x450?text=HMTI+FT-TM' ?>" 
                     alt="<?= $berita['judul']; ?>" 
                     class="w-full h-auto object-cover">
            </div>

            <div class="prose prose-lg text-gray-700 max-w-none leading-relaxed text-justify mb-12">
                <?= nl2br($berita['isi']); ?>
            </div>

            <!-- SECTION KOMENTAR --><div id="komentar" class="border-t pt-10 mt-10">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Komentar <span class="text-hmti-primary">(<?= $jumlah_komentar; ?>)</span>
                </h3>

                <!-- Form Kirim Komentar --><div class="bg-gray-50 p-6 rounded-xl mb-10 border border-gray-200">
                    <h4 class="text-lg font-bold mb-4">Tinggalkan Jejak</h4>
                    
                    <?php if(session()->getFlashdata('success')) : ?>
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif; ?>

                    <form action="/berita/kirim_komentar" method="post">
                        <input type="hidden" name="berita_id" value="<?= $berita['id']; ?>">
                        <input type="hidden" name="slug" value="<?= $berita['slug']; ?>">

                        <!-- INPUT NAMA (Full Width karena Email dihapus) --><div class="mb-4">
                            <input type="text" name="nama" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-hmti-primary" placeholder="Nama Lengkap / Samaran" required>
                        </div>
                        
                        <!-- TEXTAREA --><div class="mb-4">
                            <textarea name="isi_komentar" class="w-full px-4 py-3 border rounded-lg h-24 focus:outline-none focus:border-hmti-primary" placeholder="Tulis komentar Anda di sini..." required></textarea>
                        </div>
                        <button type="submit" class="bg-hmti-primary text-white px-6 py-2 rounded-lg font-bold hover:bg-hmti-dark transition">
                            Kirim Komentar
                        </button>
                    </form>
                </div>

                <!-- List Komentar --><div class="space-y-6">
                    <?php if(empty($komentar)): ?>
                        <p class="text-gray-500 italic">Belum ada komentar. Jadilah yang pertama!</p>
                    <?php else: ?>
                        <?php foreach($komentar as $k): ?>
                            <div class="flex gap-4">
                                <!-- HAPUS BLOK DIV INI UNTUK MENGHILANGKAN AVATAR --><!--
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($k['nama']); ?>&background=random&color=fff" 
                                         class="w-12 h-12 rounded-full border-2 border-white shadow-sm">
                                </div>
                                --><!-- GANTI DENGAN INI (JIKA INGIN INISIAL NAMA SAJA) --><div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-lg shadow-sm border-2 border-white">
                                    <?= strtoupper(substr($k['nama'], 0, 1)); ?>
                                </div>


                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h5 class="font-bold text-gray-800"><?= esc($k['nama']); ?></h5>
                                        <span class="text-xs text-gray-400">• <?= date('d M Y, H:i', strtotime($k['created_at'])); ?></span>
                                    </div>
                                    <p class="text-gray-700 text-sm leading-relaxed bg-gray-50 p-3 rounded-lg rounded-tl-none border border-gray-100">
                                        <?= nl2br(esc($k['isi_komentar'])); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- END SECTION KOMENTAR --><div class="mt-12 pt-8 border-t">
                <a href="/berita" class="inline-flex items-center text-hmti-marine font-bold hover:text-hmti-dark transition">
                    &larr; Kembali ke Daftar Berita
                </a>
            </div>
        </div>

        <!-- SIDEBAR (Kanan) --><div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100 sticky top-24">
                <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2 border-hmti-accent">
                    Berita Lainnya
                </h3>
                
                <div class="space-y-6">
                    <?php foreach($terkait as $t) : ?>
                    <div class="flex gap-4 group">
                        <a href="/berita/<?= $t['slug']; ?>" class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden">
                            <img src="<?= $t['gambar'] ? '/img/berita/' . $t['gambar'] : 'https://via.placeholder.com/100?text=Img' ?>" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </a>
                        <div>
                            <span class="<?= $t['warna_label'] ?? 'bg-gray-400'; ?> text-white text-[9px] px-1.5 py-0.5 rounded font-bold uppercase mb-1 inline-block">
                                <?= $t['nama_kategori'] ?? 'Umum'; ?>
                            </span>
                            <h4 class="text-sm font-bold text-gray-800 leading-snug mb-1 group-hover:text-hmti-primary transition">
                                <a href="/berita/<?= $t['slug']; ?>"><?= $t['judul']; ?></a>
                            </h4>
                            <span class="text-xs text-gray-500"><?= date('d M Y', strtotime($t['created_at'])); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>