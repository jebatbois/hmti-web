<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Header -->
<section class="bg-hmti-light py-20 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl md:text-4xl font-extrabold text-hmti-dark mb-4">Program Kerja HMTI</h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Agenda kegiatan dan program kerja Himpunan Mahasiswa Teknik Informatika periode ini.
        </p>
    </div>
</section>

<!-- Content -->
<div class="container mx-auto px-6 py-12">
    
    <?php if(empty($proker)): ?>
        <div class="text-center py-12 border-2 border-dashed border-gray-200 rounded-xl">
            <p class="text-gray-500 text-lg">Belum ada program kerja yang dipublikasikan.</p>
        </div>
    <?php else: ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($proker as $p) : 
                $badgeColor = 'bg-gray-100 text-gray-600';
                $badgeIcon = 'fa-calendar';
                
                if($p['status'] == 'Sedang Berjalan') {
                    $badgeColor = 'bg-blue-100 text-blue-600';
                    $badgeIcon = 'fa-spinner fa-spin';
                } elseif($p['status'] == 'Terlaksana') {
                    $badgeColor = 'bg-green-100 text-green-600';
                    $badgeIcon = 'fa-check-circle';
                }
            ?>
            
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col h-full group">
                <!-- Status Bar -->
                <div class="h-2 w-full <?= ($p['status'] == 'Terlaksana') ? 'bg-green-500' : (($p['status'] == 'Sedang Berjalan') ? 'bg-blue-500' : 'bg-gray-300') ?>"></div>
                
                <!-- Gambar Proker (Link ke Detail) -->
                <a href="/proker/<?= $p['id']; ?>" class="h-48 overflow-hidden relative block">
                    <img src="/img/proker/<?= $p['foto'] ?? 'https://via.placeholder.com/600x400?text=Program+Kerja'; ?>" 
                         alt="<?= $p['nama_program']; ?>" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-20 transition"></div>
                </a>

                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-xs font-bold text-hmti-primary uppercase tracking-wider bg-green-50 px-2 py-1 rounded">
                            <?= $p['departemen']; ?>
                        </span>
                        <span class="<?= $badgeColor; ?> px-3 py-1 rounded-full text-xs font-bold flex items-center">
                            <i class="fas <?= $badgeIcon; ?> mr-1"></i> <?= $p['status']; ?>
                        </span>
                    </div>

                    <!-- Judul (Link ke Detail) -->
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-hmti-primary transition">
                        <a href="/proker/<?= $p['id']; ?>"><?= $p['nama_program']; ?></a>
                    </h3>

                    <div class="flex items-center text-gray-500 text-xs mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <?= $p['tanggal_pelaksanaan'] ? date('d F Y', strtotime($p['tanggal_pelaksanaan'])) : 'Jadwal Menyusul'; ?>
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4 flex-grow">
                        <?= substr(strip_tags($p['deskripsi']), 0, 100); ?>...
                    </p>
                    
                    <a href="/proker/<?= $p['id']; ?>" class="text-hmti-marine text-sm font-bold hover:underline mt-auto inline-block">
                        Lihat Detail &rarr;
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>

<?= $this->endSection(); ?>