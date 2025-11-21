<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden text-white"
         style="background: linear-gradient(135deg, #0f172a 0%, #16a34a 100%);"> <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-hmti-primary opacity-20 rounded-full blur-3xl translate-y-1/2 translate-x-1/3"></div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <nav class="flex text-sm font-medium text-green-100 mb-6">
            <a href="/" class="hover:text-hmti-accent transition">Beranda</a>
            <span class="mx-2">/</span>
            <a href="/proker" class="hover:text-hmti-accent transition">Program Kerja</a>
            <span class="mx-2">/</span>
            <span class="text-white truncate max-w-[150px] md:max-w-md opacity-80">Detail</span>
        </nav>

        <div class="max-w-4xl">
            <div class="flex flex-wrap gap-3 mb-6">
                <span class="bg-white/10 backdrop-blur-md border border-white/20 text-hmti-accent text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">
                    <?= $p['departemen']; ?>
                </span>
                
                <?php 
                    $statusClass = 'bg-gray-500';
                    $statusIcon = 'fa-clock';
                    if($p['status'] == 'Sedang Berjalan') {
                        $statusClass = 'bg-hmti-accent text-black'; // Kuning
                        $statusIcon = 'fa-spinner fa-spin';
                    } elseif($p['status'] == 'Terlaksana') {
                        $statusClass = 'bg-hmti-primary text-white'; // Hijau
                        $statusIcon = 'fa-check-circle';
                    }
                ?>
                <span class="<?= $statusClass; ?> text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest flex items-center gap-2 shadow-lg">
                    <i class="fas <?= $statusIcon; ?>"></i> <?= $p['status']; ?>
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-6 drop-shadow-lg">
                <?= $p['nama_program']; ?>
            </h1>

            <div class="flex items-center gap-4 text-green-50">
                <div class="flex items-center gap-3 bg-white/10 px-5 py-3 rounded-xl border border-white/10 backdrop-blur-sm">
                    <i class="far fa-calendar-alt text-hmti-accent text-lg"></i>
                    <span class="font-mono font-bold text-lg">
                        <?= $p['tanggal_pelaksanaan'] ? date('d F Y', strtotime($p['tanggal_pelaksanaan'])) : 'Jadwal Menyusul'; ?>
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
                
                <?php if(!empty($p['foto']) && $p['foto'] != 'default_proker.jpg'): ?>
                <div class="mb-10 p-2 bg-white rounded-2xl shadow-xl">
                    <div class="rounded-xl overflow-hidden relative h-[300px] md:h-[450px] group">
                        <div class="absolute inset-0 bg-hmti-dark/10 group-hover:bg-transparent transition duration-500 z-10"></div>
                        <img src="/img/proker/<?= $p['foto']; ?>" 
                             alt="<?= $p['nama_program']; ?>" 
                             class="w-full h-full object-cover hover:scale-105 transition duration-700 ease-in-out">
                    </div>
                </div>
                <?php endif; ?>

                <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-hmti-light rounded-bl-full -mr-16 -mt-16 opacity-60"></div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 relative z-10 flex items-center gap-3">
                        <span class="w-1.5 h-8 bg-hmti-primary rounded-full"></span>
                        Tentang Kegiatan
                    </h3>
                    
                    <article class="prose prose-lg prose-slate max-w-none text-gray-600 leading-loose text-justify">
                        <?= nl2br($p['deskripsi']); ?>
                    </article>

                    <div class="mt-10 pt-8 border-t border-gray-100 flex justify-between items-center">
                        <a href="/proker" class="group inline-flex items-center gap-3 text-sm font-bold text-gray-500 hover:text-hmti-primary transition">
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-hmti-light group-hover:text-hmti-primary transition">
                                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition"></i>
                            </div>
                            Kembali ke Daftar
                        </a>
                        
                        <div class="flex gap-2">
                            <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-400 hover:bg-green-500 hover:text-white transition flex items-center justify-center">
                                <i class="fab fa-whatsapp"></i>
                            </button>
                            <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-400 hover:bg-blue-500 hover:text-white transition flex items-center justify-center">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-full lg:w-4/12">
                <div class="sticky top-24 space-y-8 mt-12 lg:mt-24">
                    
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-hmti-light rounded-bl-full -mr-8 -mt-8"></div>
                        
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Status Kegiatan</h4>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full flex items-center justify-center text-2xl shadow-inner
                                <?= ($p['status'] == 'Terlaksana') ? 'bg-green-100 text-hmti-primary' : 'bg-yellow-100 text-yellow-600'; ?>">
                                <i class="fas <?= $statusIcon; ?>"></i>
                            </div>
                            <div>
                                <span class="block text-lg font-bold text-gray-800 leading-none mb-1"><?= $p['status']; ?></span>
                                <span class="text-xs text-gray-500">
                                    <?= $p['status'] == 'Terlaksana' ? 'Kegiatan telah selesai.' : 'Kegiatan sedang/akan berlangsung.'; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-hmti-dark border-b border-green-900">
                            <h3 class="text-white font-bold flex items-center gap-2">
                                <i class="fas fa-list-ul text-hmti-accent"></i> Program Lainnya
                            </h3>
                        </div>
                        
                        <div class="divide-y divide-gray-100">
                            <?php foreach($lainnya as $l) : ?>
                            <a href="/proker/<?= $l['id']; ?>" class="flex gap-4 p-4 hover:bg-hmti-light transition group">
                                <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden bg-gray-200 relative border border-gray-200">
                                    <img src="/img/proker/<?= $l['foto'] ?? 'default.jpg'; ?>" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-800 leading-snug mb-1 group-hover:text-hmti-primary transition line-clamp-2">
                                        <?= $l['nama_program']; ?>
                                    </h4>
                                    <span class="text-xs text-gray-500 flex items-center gap-1">
                                        <i class="far fa-calendar-alt text-gray-400"></i>
                                        <?= $l['tanggal_pelaksanaan'] ? date('d M Y', strtotime($l['tanggal_pelaksanaan'])) : '-'; ?>
                                    </span>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="p-4 bg-gray-50 text-center border-t border-gray-200">
                            <a href="/proker" class="text-xs font-bold text-hmti-primary hover:text-hmti-dark hover:underline uppercase tracking-wide">
                                Lihat Semua Program
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>