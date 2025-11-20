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

<!-- Wall of Aspirations (Slider Mode) -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        
        <?php if(session()->getFlashdata('success')) : ?>
            <div class="max-w-2xl mx-auto bg-green-100 text-green-800 p-4 rounded-lg mb-8 text-center shadow-sm border border-green-200">
                <i class="fas fa-check-circle mr-2"></i> <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- ERROR MESSAGE (KATA KASAR) -->
        <?php if(session()->getFlashdata('error')) : ?>
            <div class="max-w-2xl mx-auto bg-red-100 text-red-800 p-4 rounded-lg mb-8 text-center shadow-sm border border-red-200 animate-pulse">
                <i class="fas fa-exclamation-triangle mr-2"></i> <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- LOGIC LAYOUT -->
        <?php if(empty($aspirasi)): ?>
            
            <!-- TAMPILAN JIKA KOSONG -->
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

            <!-- SLIDER CONTAINER -->
            <div class="relative group">
                
                <!-- Tombol Navigasi (Desktop) -->
                <button onclick="scrollMimbar(-1)" class="hidden md:block absolute left-0 top-1/2 -translate-y-1/2 -ml-4 z-20 bg-white text-hmti-primary w-10 h-10 rounded-full shadow-lg hover:bg-hmti-primary hover:text-white transition opacity-0 group-hover:opacity-100 flex items-center justify-center">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="scrollMimbar(1)" class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 -mr-4 z-20 bg-white text-hmti-primary w-10 h-10 rounded-full shadow-lg hover:bg-hmti-primary hover:text-white transition opacity-0 group-hover:opacity-100 flex items-center justify-center">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- SLIDER TRACK -->
                <div id="mimbarSlider" class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-8 no-scrollbar scroll-smooth">
                    
                    <?php foreach($aspirasi as $a) : ?>
                        <!-- CARD ITEM -->
                        <div class="snap-center flex-shrink-0 w-[85%] md:w-[calc(33.333%-1.5rem)] <?= $a['warna_bg']; ?> p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 transform hover:-rotate-1 border border-black/5 relative flex flex-col justify-between h-64">
                            
                            <div class="absolute top-4 right-4 text-black/20 text-4xl">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            
                            <div class="flex-grow overflow-y-auto no-scrollbar mb-4 relative z-10">
                                <p class="text-gray-800 text-lg font-medium leading-relaxed font-handwriting">
                                    "<?= nl2br(esc($a['isi_aspirasi'])); ?>"
                                </p>
                            </div>
                            
                            <div class="flex justify-between items-end border-t border-black/10 pt-4 mt-auto">
                                <div>
                                    <span class="block font-bold text-gray-900 text-sm">
                                        <?= esc($a['nama_pengirim']); ?>
                                    </span>
                                    <?php if($a['angkatan']): ?>
                                        <span class="text-xs text-gray-700 bg-white/50 px-2 py-0.5 rounded border border-black/10">
                                            Angkatan <?= esc($a['angkatan']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <span class="text-xs text-gray-600">
                                    <?= date('d M Y', strtotime($a['created_at'])); ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                
                <!-- Indikator Mobile -->
                <div class="md:hidden text-center text-gray-400 text-xs mt-2 animate-pulse">
                    &larr; Geser untuk melihat lainnya &rarr;
                </div>

            </div>

        <?php endif; ?>

        <!-- Form Section -->
        <div id="form-aspirasi" class="max-w-2xl mx-auto mt-20">
            
            <!-- WARNING BOX (Penambahan Fitur) -->
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-yellow-600 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-bold text-yellow-800">Aturan Mimbar Bebas</h3>
                        <div class="mt-1 text-sm text-yellow-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Gunakan bahasa yang sopan dan tidak mengandung SARA.</li>
                                <li>Dilarang menggunakan kata-kata kasar/kotor (termasuk sensor angka/simbol).</li>
                                <li>Sistem otomatis memfilter dan menolak pesan yang melanggar.</li>
                                <li>Tunggu minimal 60 detik untuk mengirim pesan baru (anti spam).</li>
                                <li>Pesan yang dikirim bersifat publik dan dapat dilihat oleh siapa saja
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Suarakan Pikiranmu!</h2>
                    <p class="text-gray-500 text-sm">Pesan akan tampil secara publik.</p>
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
    .font-handwriting {
        font-family: 'Patrick Hand', cursive;
    }
    
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  
        scrollbar-width: none;  
    }
</style>

<script>
    function scrollMimbar(direction) {
        const container = document.getElementById('mimbarSlider');
        const scrollAmount = container.offsetWidth / 3; 
        container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }
</script>

<?= $this->endSection(); ?>