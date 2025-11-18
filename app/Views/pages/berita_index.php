<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="bg-hmti-marine py-20 text-center text-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full bg-pattern opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl font-bold mb-4 mt-9">Kabar Informatika</h1>
        <p class="text-blue-100 text-lg max-w-2xl mx-auto">
            Update terbaru seputar kegiatan kemahasiswaan, prestasi, dan teknologi informasi di lingkungan UMRAH.
        </p>
    </div>
</section>

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        <div class="max-w-xl mx-auto mb-12">
            <div class="relative">
                <input type="text" placeholder="Cari berita..." class="w-full py-3 px-5 rounded-full border border-gray-300 focus:outline-none focus:border-hmti-primary focus:ring-1 focus:ring-hmti-primary shadow-sm">
                <button class="absolute right-2 top-1.5 bg-hmti-primary text-white p-2 rounded-full hover:bg-hmti-dark transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>

        <?php if($berita) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($berita as $b) : ?>
                    <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl transition duration-300 flex flex-col border border-gray-100 group">
                        <a href="/berita/<?= $b['slug']; ?>" class="h-52 overflow-hidden relative block">
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition z-10"></div>
                            <img src="<?= $b['gambar'] ? '/img/berita/' . $b['gambar'] : 'https://via.placeholder.com/400x250?text=HMTI+News' ?>" 
                                 alt="<?= $b['judul']; ?>" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                        </a>
                        
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="text-xs font-bold text-hmti-primary mb-2 uppercase tracking-wide">
                                Berita & Kegiatan
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 mb-3 leading-snug hover:text-hmti-marine transition">
                                <a href="/berita/<?= $b['slug']; ?>"><?= $b['judul']; ?></a>
                            </h2>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
                                <?= strip_tags(substr($b['isi'], 0, 120)); ?>...
                            </p>
                            
                            <div class="flex items-center justify-between border-t pt-4 mt-auto">
                                <span class="text-xs text-gray-400 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <?= date('d M Y', strtotime($b['created_at'])); ?>
                                </span>
                                <a href="/berita/<?= $b['slug']; ?>" class="text-sm font-bold text-hmti-marine hover:underline">
                                    Baca &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 flex justify-center">
                <div class="pagination-custom">
                    <?= $pager->links('berita', 'default_full') ?>
                </div>
            </div>

        <?php else : ?>
            <div class="text-center py-20">
                <h3 class="text-2xl font-bold text-gray-400">Belum ada berita saat ini.</h3>
            </div>
        <?php endif; ?>

    </div>
</section>

<style>
    .pagination-custom ul { display: flex; gap: 0.5rem; }
    .pagination-custom li a, .pagination-custom li span {
        display: inline-block; padding: 0.5rem 1rem; border-radius: 0.5rem;
        background-color: white; border: 1px solid #e5e7eb; color: #374151;
    }
    .pagination-custom li.active a, .pagination-custom li.active span {
        background-color: #16a34a; color: white; border-color: #16a34a;
    }
    .pagination-custom li a:hover { background-color: #f3f4f6; }
</style>

<?= $this->endSection(); ?>