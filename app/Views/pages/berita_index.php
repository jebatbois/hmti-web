<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-28 md:pt-44 md:pb-36 overflow-hidden text-center text-white"
         style="background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);">
    
    <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-600 opacity-20 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-green-500 opacity-10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="mb-6 animate-bounce-slow">
            <span class="inline-block font-extrabold px-6 py-2 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.4)] border border-blue-400/30 text-blue-300 text-xs md:text-sm backdrop-blur-md bg-blue-900/30 uppercase tracking-widest">
                📰 Portal Informasi
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-2xl tracking-tight">
            Kabar Informatika
        </h1>
        
        <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed opacity-90">
            Pusat informasi terkini seputar kegiatan kemahasiswaan, prestasi, dan perkembangan teknologi di lingkungan UMRAH.
        </p>
    </div>
</section>

<section class="bg-gray-50 min-h-screen pb-24 relative z-20">
    
    <div class="container mx-auto px-4 md:px-8 relative z-30 -mt-8 mb-16">
        <div class="max-w-3xl mx-auto mt-20">
            <form action="" method="get" class="relative group">
                <div class="absolute inset-0 bg-blue-600 rounded-full blur opacity-20 group-hover:opacity-30 transition duration-500"></div>
                
                <div class="relative bg-white rounded-full shadow-2xl p-2 flex items-center border border-gray-100">
                    <div class="pl-6 text-gray-400 hidden md:block">
                        <i class="fas fa-search text-lg"></i>
                    </div>
                    <input type="text" name="keyword" value="<?= $keyword ?? ''; ?>" 
                           placeholder="Cari berita, prestasi, atau kegiatan..." 
                           class="w-full py-3 px-4 md:px-6 text-gray-700 bg-transparent border-none focus:ring-0 text-base md:text-lg placeholder-gray-400 outline-none rounded-full">
                    
                    <button type="submit" class="flex-shrink-0 w-12 h-12 bg-blue-800 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition shadow-lg transform active:scale-95 ml-2">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mx-auto px-4 md:px-8">

        <?php if($berita) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                <?php foreach($berita as $b) : 
                    // Logika Warna Label
                    $kategori = $b['nama_kategori'] ?? 'Berita';
                    $labelColor = 'bg-blue-600'; // Default
                    if(stripos($kategori, 'Prestasi') !== false) $labelColor = 'bg-yellow-500';
                    if(stripos($kategori, 'Akademik') !== false) $labelColor = 'bg-green-600';
                    if(stripos($kategori, 'Opini') !== false) $labelColor = 'bg-purple-600';
                ?>

                <article class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full group">
                    
                    <a href="/berita/<?= $b['slug']; ?>" class="h-60 overflow-hidden relative block">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 z-10"></div>
                        
                        <span class="absolute top-4 left-4 z-20 text-[10px] font-bold text-white px-3 py-1.5 rounded-full shadow-md uppercase tracking-wider backdrop-blur-md <?= $labelColor; ?> bg-opacity-90 border border-white/20">
                            <?= $kategori; ?>
                        </span>

                        <img src="<?= $b['gambar'] ? '/img/berita/' . $b['gambar'] : 'https://via.placeholder.com/400x250?text=HMTI+News' ?>" 
                             alt="<?= $b['judul']; ?>" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                    </a>
                    
                    <div class="p-7 flex flex-col flex-grow relative">
                        
                        <div class="flex items-center text-xs text-gray-400 mb-3 font-semibold uppercase tracking-wide">
                            <i class="far fa-clock mr-2 text-blue-500"></i>
                            <?= date('d F Y', strtotime($b['created_at'])); ?>
                        </div>

                        <h2 class="text-xl font-bold text-gray-800 mb-3 leading-snug group-hover:text-blue-700 transition line-clamp-2">
                            <a href="/berita/<?= $b['slug']; ?>"><?= $b['judul']; ?></a>
                        </h2>

                        <p class="text-gray-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                            <?= strip_tags(substr($b['isi'], 0, 120)); ?>...
                        </p>
                        
                        <div class="mt-auto pt-5 border-t border-gray-100 flex justify-between items-center">
                            <a href="/berita/<?= $b['slug']; ?>" class="text-sm font-bold text-blue-700 hover:text-blue-900 transition inline-flex items-center group-hover:gap-2 duration-300">
                                Baca Selengkapnya 
                                <i class="fas fa-arrow-right ml-1 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <div class="mt-20 flex justify-center">
                <div class="pagination-modern">
                    <?= $pager->links('berita', 'default_full') ?>
                </div>
            </div>

        <?php else : ?>
            
            <div class="text-center py-24 bg-white rounded-[2rem] shadow-sm border border-dashed border-gray-300 max-w-3xl mx-auto mt-10">
                <div class="inline-block p-5 rounded-full bg-blue-50 text-blue-600 mb-6 animate-pulse">
                    <i class="fas fa-search text-4xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Berita Tidak Ditemukan</h3>
                <p class="text-gray-500 mb-8">Kami tidak dapat menemukan berita dengan kata kunci "<strong><?= esc($keyword); ?></strong>".</p>
                <a href="/berita" class="inline-block px-8 py-3 bg-gray-100 text-gray-700 rounded-full font-bold hover:bg-gray-200 transition">
                    Reset Pencarian
                </a>
            </div>

        <?php endif; ?>

    </div>
</section>

<style>
    .pagination-modern ul {
        display: flex;
        gap: 0.6rem;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .pagination-modern li a, .pagination-modern li span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: white;
        border: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .pagination-modern li.active a, .pagination-modern li.active span {
        background-color: #1e40af; /* Blue-800 */
        color: white;
        border-color: #1e40af;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
    }
    .pagination-modern li a:hover:not(.active) {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #1e40af;
        transform: translateY(-2px);
    }
</style>

<?= $this->endSection(); ?>