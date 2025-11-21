<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-28 md:pt-44 md:pb-36 overflow-hidden text-center text-white"
         style="background-color: #0b121e;"> <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"
         style="background-color: rgba(30, 64, 175, 0.15);"></div> <div class="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4 pointer-events-none"
         style="background-color: rgba(22, 163, 74, 0.15);"></div> <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>

    <div class="container mx-auto px-4 relative z-10">
        
        <div class="mb-6 animate-bounce-slow">
            <span class="inline-block font-extrabold px-6 py-2 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.4)] border border-blue-500/30 text-sm md:text-base backdrop-blur-md"
                  style="background-color: rgba(30, 64, 175, 0.2); color: #60a5fa;">
                🔥 Agenda & Kegiatan
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight drop-shadow-lg">
            Program Kerja HMTI
        </h1>
        <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed">
            Eksplorasi agenda kegiatan Himpunan Mahasiswa Teknik Informatika untuk mewujudkan visi bersama.
        </p>
    </div>
</section>

<section class="bg-gray-50 min-h-screen pb-24 mt-20 relative z-20">
    
    <div class="container mx-auto px-4 md:px-8 -mt-10 mb-16 relative z-30">
        <div class="max-w-4xl mx-auto bg-white p-4 rounded-2xl shadow-2xl border border-gray-100 flex flex-col md:flex-row gap-4 items-center">
            
            <div class="relative flex-grow w-full">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Cari program kerja..." class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            </div>

            <button class="w-full md:w-auto px-8 py-3 bg-blue-800 text-white font-bold rounded-xl hover:bg-blue-700 transition shadow-lg">
                Cari
            </button>
        </div>
    </div>

    <div class="container mx-auto px-4 md:px-8">
        
        <?php if(empty($proker)): ?>
            <div class="text-center py-20 border-2 border-dashed border-gray-300 rounded-3xl bg-white">
                <div class="inline-block p-5 rounded-full bg-gray-100 text-gray-400 mb-4">
                    <i class="fas fa-clipboard-list text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700">Belum ada Program Kerja</h3>
                <p class="text-gray-500">Silakan cek kembali nanti untuk pembaruan terbaru.</p>
            </div>
        <?php else: ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($proker as $p) : 
                    // Logika Warna Badge Status
                    $badgeBg = 'bg-gray-100 text-gray-600';
                    $badgeIcon = 'fa-clock';
                    $statusText = 'Akan Datang';
                    
                    if($p['status'] == 'Sedang Berjalan') {
                        $badgeBg = 'bg-yellow-100 text-yellow-700 border-yellow-200';
                        $badgeIcon = 'fa-spinner fa-spin';
                        $statusText = 'Berlangsung';
                    } elseif($p['status'] == 'Terlaksana') {
                        $badgeBg = 'bg-green-100 text-green-700 border-green-200';
                        $badgeIcon = 'fa-check-circle';
                        $statusText = 'Selesai';
                    }
                ?>
                
                <article class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full group relative">
                    
                    <a href="/proker/<?= $p['id']; ?>" class="h-56 overflow-hidden relative block">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition z-10"></div>
                        
                        <span class="absolute top-4 right-4 z-20 <?= $badgeBg; ?> border text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wide shadow-sm flex items-center gap-1.5">
                            <i class="fas <?= $badgeIcon; ?>"></i> <?= $statusText; ?>
                        </span>

                        <span class="absolute bottom-4 left-4 z-20 bg-white/90 backdrop-blur-sm text-blue-900 text-[10px] font-extrabold px-3 py-1 rounded-lg shadow-sm uppercase tracking-wider border border-white">
                            <?= $p['departemen']; ?>
                        </span>

                        <img src="/img/proker/<?= $p['foto'] ?? 'default.jpg'; ?>" 
                             onerror="this.src='https://via.placeholder.com/600x400?text=HMTI+Proker'"
                             alt="<?= $p['nama_program']; ?>" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                    </a>

                    <div class="p-7 flex-grow flex flex-col">
                        <div class="flex items-center text-xs text-gray-400 mb-3 font-semibold uppercase tracking-wide">
                            <i class="far fa-calendar-alt mr-2 text-blue-500"></i>
                            <?= $p['tanggal_pelaksanaan'] ? date('d F Y', strtotime($p['tanggal_pelaksanaan'])) : 'Jadwal Menyusul'; ?>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-700 transition">
                            <a href="/proker/<?= $p['id']; ?>">
                                <?= $p['nama_program']; ?>
                            </a>
                        </h3>

                        <p class="text-gray-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                            <?= substr(strip_tags($p['deskripsi']), 0, 120); ?>...
                        </p>
                        
                        <div class="mt-auto pt-5 border-t border-gray-100 flex justify-between items-center">
                            <a href="/proker/<?= $p['id']; ?>" class="text-sm font-bold text-blue-700 hover:text-blue-900 transition inline-flex items-center group-hover:gap-2">
                                Lihat Detail <i class="fas fa-arrow-right ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </div>
</section>

<?= $this->endSection(); ?>