<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen Berita</h1>
    <a href="/admin/berita/create" class="bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow flex items-center transition">
        <i class="fas fa-plus mr-2"></i> Tulis Berita
    </a>
</div>

<?php if(session()->getFlashdata('success')) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                <th class="py-3 px-6 text-left">Gambar</th>
                <th class="py-3 px-6 text-left">Judul & Tanggal</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($berita as $b) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-6 text-left whitespace-nowrap w-24">
                    <div class="w-16 h-16 rounded overflow-hidden shadow-sm border border-gray-200">
                        <img src="<?= $b['gambar'] ? '/img/berita/'.$b['gambar'] : 'https://via.placeholder.com/150?text=No+Img' ?>" 
                             class="w-full h-full object-cover">
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <span class="font-medium text-gray-800 text-base block mb-1"><?= $b['judul']; ?></span>
                    <span class="text-xs bg-blue-100 text-blue-600 py-1 px-2 rounded-full">
                        <i class="far fa-calendar-alt mr-1"></i> <?= date('d M Y, H:i', strtotime($b['created_at'])); ?>
                    </span>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center gap-2">
                        <a href="/berita/<?= $b['slug']; ?>" target="_blank" class="w-8 h-8 rounded bg-gray-200 text-gray-600 flex items-center justify-center hover:bg-gray-300" title="Lihat di Web">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/admin/berita/edit/<?= $b['id']; ?>" class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200" title="Edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="/admin/berita/delete/<?= $b['id']; ?>" method="post" onsubmit="return confirm('Hapus berita ini?');">
                            <button type="submit" class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>