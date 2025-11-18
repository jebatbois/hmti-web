<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Moderasi Komentar Berita</h1>
    <p class="text-gray-600 text-sm">Kelola komentar yang masuk pada artikel berita.</p>
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
                <th class="py-3 px-6 text-left">Pengirim</th>
                <th class="py-3 px-6 text-left">Komentar & Berita</th>
                <th class="py-3 px-6 text-center">Status</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($komentar as $k) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50 align-top <?= ($k['status'] == 'sembunyi') ? 'bg-red-50' : ''; ?>">
                <td class="py-4 px-6 text-left whitespace-nowrap">
                    <div class="font-bold text-gray-800"><?= esc($k['nama']); ?></div>
                    <!-- HAPUS EMAIL DARI SINI -->
                    <span class="text-xs text-gray-400 block">
                        <i class="far fa-clock"></i> <?= date('d M Y', strtotime($k['created_at'])); ?>
                    </span>
                </td>
                <td class="py-4 px-6 text-left">
                    <div class="text-gray-800 italic mb-2">"<?= nl2br(esc($k['isi_komentar'])); ?>"</div>
                    <a href="/berita/<?= $k['slug_berita']; ?>" target="_blank" class="text-xs font-bold text-hmti-primary hover:underline bg-gray-100 px-2 py-1 rounded">
                        <i class="fas fa-link mr-1"></i> <?= $k['judul_berita']; ?>
                    </a>
                </td>
                <td class="py-4 px-6 text-center">
                    <?php if($k['status'] == 'tampil'): ?>
                        <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs font-bold">Tampil</span>
                    <?php else: ?>
                        <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs font-bold">Disembunyikan</span>
                    <?php endif; ?>
                </td>
                <td class="py-4 px-6 text-center">
                    <div class="flex item-center justify-center gap-2">
                        <!-- Tombol Toggle Hide/Show -->
                        <form action="/admin/komentar/toggle/<?= $k['id']; ?>/<?= $k['status']; ?>" method="post">
                            <?php if($k['status'] == 'tampil'): ?>
                                <button type="submit" class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200" title="Sembunyikan">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            <?php else: ?>
                                <button type="submit" class="w-8 h-8 rounded bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200" title="Tampilkan Kembali">
                                    <i class="fas fa-eye"></i>
                                </button>
                            <?php endif; ?>
                        </form>
                        
                        <!-- Tombol Hapus Permanen -->
                        <form action="/admin/komentar/delete/<?= $k['id']; ?>" method="post" onsubmit="return confirm('Hapus komentar ini secara permanen?');">
                            <button type="submit" class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200" title="Hapus Permanen">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if(empty($komentar)): ?>
                <tr>
                    <td colspan="4" class="text-center py-8 text-gray-500">Belum ada komentar pada berita.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>