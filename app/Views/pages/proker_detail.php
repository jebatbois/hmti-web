<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Breadcrumb -->
<div class="bg-gray-100 py-4 pt-24 border-b">
    <div class="container mx-auto px-6">
        <div class="text-sm text-gray-500">
            <a href="/" class="hover:text-hmti-primary">Beranda</a> 
            <span class="mx-2">/</span> 
            <a href="/proker" class="hover:text-hmti-primary">Program Kerja</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium truncate"><?= substr($p['nama_program'], 0, 30); ?>...</span>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        
        <!-- KONTEN UTAMA (Kiri) -->
        <div class="w-full lg:w-2/3">
            
            <!-- Badge Status & Departemen -->
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-hmti-primary text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wider">
                    <?= $p['departemen']; ?>
                </span>
                <?php 
                    $statusClass = 'bg-gray-200 text-gray-600';
                    if($p['status'] == 'Sedang Berjalan') $statusClass = 'bg-blue-100 text-blue-600';
                    if($p['status'] == 'Terlaksana') $statusClass = 'bg-green-100 text-green-600';
                ?>
                <span class="<?= $statusClass; ?> px-3 py-1 rounded text-xs font-bold">
                    <?= $p['status']; ?>
                </span>
            </div>

            <!-- Judul -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                <?= $p['nama_program']; ?>
            </h1>

            <!-- Info Tanggal -->
            <div class="flex items-center text-gray-600 mb-8 border-b pb-8">
                <div class="flex items-center mr-8">
                    <div class="p-2 bg-blue-50 text-blue-600 rounded-lg mr-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-xs text-gray-500 uppercase font-bold">Tanggal Pelaksanaan</span>
                        <span class="font-medium text-gray-800">
                            <?= $p['tanggal_pelaksanaan'] ? date('d F Y', strtotime($p['tanggal_pelaksanaan'])) : 'Akan Diinformasikan'; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Gambar Utama -->
            <?php if(!empty($p['foto']) && $p['foto'] != 'default_proker.jpg'): ?>
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                <img src="/img/proker/<?= $p['foto']; ?>" 
                     alt="<?= $p['nama_program']; ?>" 
                     class="w-full h-auto object-cover">
            </div>
            <?php endif; ?>

            <!-- Deskripsi -->
            <div class="prose prose-lg text-gray-700 max-w-none leading-relaxed text-justify">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Deskripsi Kegiatan</h3>
                <?= nl2br($p['deskripsi']); ?>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-12 pt-8 border-t">
                <a href="/proker" class="inline-flex items-center font-bold text-hmti-marine hover:text-hmti-dark transition group">
                    <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center mr-2 group-hover:bg-blue-100 transition">
                        &larr;
                    </span>
                    Kembali ke Daftar Program Kerja
                </a>
            </div>
        </div>

        <!-- SIDEBAR (Kanan) -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 sticky top-24">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="w-1 h-6 bg-hmti-accent rounded mr-3"></span>
                    Program Lainnya
                </h3>
                
                <div class="space-y-6">
                    <?php foreach($lainnya as $l) : ?>
                    <a href="/proker/<?= $l['id']; ?>" class="flex gap-4 group items-start">
                        <div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-gray-100 border border-gray-200">
                            <img src="/img/proker/<?= $l['foto'] ?? 'https://via.placeholder.com/100'; ?>" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-800 leading-snug mb-1 group-hover:text-hmti-primary transition line-clamp-2">
                                <?= $l['nama_program']; ?>
                            </h4>
                            <span class="text-xs text-gray-500 block mb-1">
                                <?= $l['tanggal_pelaksanaan'] ? date('d M Y', strtotime($l['tanggal_pelaksanaan'])) : '-'; ?>
                            </span>
                            <?php if($l['status'] == 'Terlaksana'): ?>
                                <span class="text-[10px] bg-green-100 text-green-600 px-2 py-0.5 rounded font-bold">Selesai</span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>