<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kotak Masuk (Pesan Kontak)</h1>
    <p class="text-gray-600 text-sm">Daftar pesan yang masuk melalui formulir "Hubungi Kami".</p>
</div>

<?php if(session()->getFlashdata('success')) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                <th class="py-3 px-6 text-left">Tanggal</th>
                <th class="py-3 px-6 text-left">Pengirim</th>
                <th class="py-3 px-6 text-left">Pesan</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($pesan as $p) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50 align-top">
                <td class="py-4 px-6 text-left whitespace-nowrap font-medium">
                    <?= date('d M Y', strtotime($p['created_at'])); ?><br>
                    <span class="text-xs text-gray-400"><?= date('H:i', strtotime($p['created_at'])); ?> WIB</span>
                </td>
                <td class="py-4 px-6 text-left">
                    <div class="font-bold text-gray-800"><?= esc($p['nama']); ?></div>
                    <div class="text-xs text-blue-500"><?= esc($p['email']); ?></div>
                </td>
                <td class="py-4 px-6 text-left">
                    <span class="block font-bold text-gray-700 mb-1"><?= esc($p['subjek']); ?></span>
                    <p class="text-gray-600 leading-relaxed"><?= nl2br(esc($p['pesan'])); ?></p>
                </td>
                <td class="py-4 px-6 text-center">
                    <div class="flex item-center justify-center gap-2">
                        <!-- Tombol Balas (Mailto) -->
                        <a href="mailto:<?= $p['email']; ?>?subject=Balasan: <?= urlencode($p['subjek']); ?>" class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200" title="Balas Email">
                            <i class="fas fa-reply"></i>
                        </a>
                        
                        <form action="/admin/pesan/delete/<?= $p['id']; ?>" method="post" onsubmit="return confirm('Hapus pesan ini?');">
                            <button type="submit" class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            
            <?php if(empty($pesan)): ?>
                <tr>
                    <td colspan="4" class="text-center py-8 text-gray-500">Belum ada pesan masuk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>