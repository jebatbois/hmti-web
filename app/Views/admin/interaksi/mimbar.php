<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Moderasi Mimbar Bebas</h1>
    <p class="text-gray-600 text-sm">Pantau dan hapus aspirasi yang mengandung SARA atau kata kasar.</p>
</div>

<?php if(session()->getFlashdata('success')) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- Grid Layout untuk Moderasi -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach($aspirasi as $a) : ?>
        <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden flex flex-col h-full">
            <div class="p-4 flex-grow <?= $a['warna_bg']; ?> bg-opacity-30">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <span class="font-bold text-gray-800 block"><?= esc($a['nama_pengirim']); ?></span>
                        <?php if($a['angkatan']): ?>
                            <span class="text-xs bg-white px-2 py-0.5 rounded border text-gray-500">Angkatan <?= esc($a['angkatan']); ?></span>
                        <?php endif; ?>
                    </div>
                    <span class="text-xs text-gray-500"><?= date('d/m/y', strtotime($a['created_at'])); ?></span>
                </div>
                <p class="text-gray-800 text-sm italic">"<?= nl2br(esc($a['isi_aspirasi'])); ?>"</p>
            </div>
            
            <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 flex justify-end">
                <form action="/admin/mimbar/delete/<?= $a['id']; ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus aspirasi ini? Tindakan ini tidak bisa dibatalkan.');">
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-bold flex items-center">
                        <i class="fas fa-trash-alt mr-1"></i> Hapus (Moderasi)
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($aspirasi)): ?>
    <div class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
        Belum ada aspirasi yang masuk.
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>