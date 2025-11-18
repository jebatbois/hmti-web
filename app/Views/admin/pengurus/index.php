<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800">Struktur Organisasi</h1>
    <a href="/admin/pengurus/create" class="bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow flex items-center transition">
        <i class="fas fa-plus mr-2"></i> Tambah Anggota
    </a>
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
                <th class="py-3 px-6 text-center">Urutan</th>
                <th class="py-3 px-6 text-left">Profil</th>
                <th class="py-3 px-6 text-left">Jabatan & Divisi</th>
                <th class="py-3 px-6 text-center">Angkatan</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($pengurus as $p) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-6 text-center font-bold text-gray-500">
                    <?= $p['urutan']; ?>
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-300 mr-3">
                            <?php if($p['foto'] == 'default.png' || !$p['foto']): ?>
                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($p['nama']); ?>&background=random" class="w-full h-full object-cover">
                            <?php else: ?>
                                <img src="/img/pengurus/<?= $p['foto']; ?>" class="w-full h-full object-cover">
                            <?php endif; ?>
                        </div>
                        <span class="font-medium text-gray-800"><?= $p['nama']; ?></span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <span class="block font-bold text-gray-700 text-xs"><?= $p['jabatan']; ?></span>
                    <span class="block text-xs text-gray-500"><?= $p['departemen']; ?></span>
                    <?php if($p['sub_divisi']): ?>
                        <span class="block text-[10px] text-blue-500 mt-1"><?= $p['sub_divisi']; ?></span>
                    <?php endif; ?>
                </td>
                <td class="py-3 px-6 text-center">
                    <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs">
                        <?= $p['angkatan']; ?>
                    </span>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center gap-2">
                        <a href="/admin/pengurus/edit/<?= $p['id']; ?>" class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200" title="Edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="/admin/pengurus/delete/<?= $p['id']; ?>" method="post" onsubmit="return confirm('Hapus anggota ini?');">
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