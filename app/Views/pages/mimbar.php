<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="bg-gradient-to-r from-blue-600 to-hmti-primary py-24 text-center text-white relative z-10">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 mt-9">Mimbar Bebas</h1>
        <p class="text-blue-100 text-lg max-w-2xl mx-auto mb-8">
            Ruang ekspresi mahasiswa Informatika. Sampaikan aspirasi, unek-unek, salam, atau pantun secara bebas dan bertanggung jawab.
        </p>
        
        <a href="#form-aspirasi" class="inline-block bg-yellow-400 text-yellow-900 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:-translate-y-1">
            <i class="fas fa-bullhorn mr-2"></i> Tulis Aspirasi
        </a>
    </div>
</section>

<!-- Wall of Aspirations -->
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        <?php if(session()->getFlashdata('success')) : ?>
            <div class="max-w-2xl mx-auto bg-green-100 text-green-800 p-4 rounded-lg mb-8 text-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- LOGIC LAYOUT: Cek Dulu Datanya -->
        <?php if(empty($aspirasi)): ?>
            
            <!-- TAMPILAN JIKA KOSONG (Full Width & Centered) -->
            <div class="flex justify-center items-center py-12">
                <div class="bg-white p-10 rounded-2xl shadow-md text-center max-w-lg w-full border-2 border-dashed border-gray-300">
                    <div class="text-gray-300 mb-4">
                        <i class="fas fa-comments text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Belum ada aspirasi</h3>
                    <p class="text-gray-500">Jadilah yang pertama menulis di dinding ini!</p>
                </div>
            </div>

        <?php else: ?>

            <!-- TAMPILAN JIKA ADA DATA (Masonry Grid) -->
            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
                <?php foreach($aspirasi as $a) : ?>
                    <!-- Card Aspirasi -->
                    <div class="break-inside-avoid <?= $a['warna_bg']; ?> p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 transform hover:-rotate-1 border border-black/5 relative group">
                        <div class="absolute top-4 right-4 text-black/20 text-4xl">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        
                        <p class="text-gray-800 text-lg font-medium leading-relaxed mb-6 relative z-10 font-handwriting">
                            "<?= nl2br(esc($a['isi_aspirasi'])); ?>"
                        </p>
                        
                        <div class="flex justify-between items-end border-t border-black/10 pt-4">
                            <div>
                                <span class="block font-bold text-gray-900">
                                    <?= esc($a['nama_pengirim']); ?>
                                </span>
                                <?php if($a['angkatan']): ?>
                                    <span class="text-xs text-gray-600 bg-white/50 px-2 py-0.5 rounded">
                                        Angkatan <?= esc($a['angkatan']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <span class="text-xs text-gray-500">
                                <?= date('d M Y', strtotime($a['created_at'])); ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <!-- Form Section -->
        <div id="form-aspirasi" class="max-w-2xl mx-auto mt-20">
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Suarakan Pikiranmu!</h2>
                    <p class="text-gray-500 text-sm">Pesan akan tampil secara publik. Gunakan bahasa yang sopan.</p>
                </div>

                <form action="/mimbar/kirim" method="post">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama / Samaran</label>
                            <input type="text" name="nama_pengirim" class="w-full px-4 py-3 border rounded-lg bg-gray-50 focus:bg-white focus:outline-none focus:border-hmti-primary transition" placeholder="Boleh kosong (Anonim)" value="<?= old('nama_pengirim'); ?>">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Angkatan (Opsional)</label>
                            <input type="number" name="angkatan" class="w-full px-4 py-3 border rounded-lg bg-gray-50 focus:bg-white focus:outline-none focus:border-hmti-primary" placeholder="Contoh: 2023" value="<?= old('angkatan'); ?>">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Isi Aspirasi / Pesan</label>
                        <textarea name="isi_aspirasi" class="w-full px-4 py-3 border rounded-lg h-32 bg-gray-50 focus:bg-white focus:outline-none focus:border-hmti-primary transition" placeholder="Tulis sesuatu di sini..." required><?= old('isi_aspirasi'); ?></textarea>
                    </div>
                    <button type="submit" class="w-full bg-hmti-marine text-white font-bold py-3 rounded-lg hover:bg-hmti-dark transition shadow-lg">
                        Tempel di Mimbar <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

<style>
    /* Google Font sudah di-import di template.php sekarang */
    .font-handwriting {
        font-family: 'Patrick Hand', cursive;
    }
</style>

<?= $this->endSection(); ?>