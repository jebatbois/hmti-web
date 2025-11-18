<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800">Program Kerja</h1>
    <a href="/admin/proker/create" class="bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow flex items-center transition">
        <i class="fas fa-plus mr-2"></i> Tambah Proker
    </a>
</div>

<?php if(session()->getFlashdata('success')) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                <th class="py-3 px-6 text-left">Foto</th> <!-- Kolom Foto --><th class="py-3 px-6 text-left">Nama Program</th>
                <th class="py-3 px-6 text-left">Departemen</th>
                <th class="py-3 px-6 text-center">Tanggal</th>
                <th class="py-3 px-6 text-center">Status</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($proker as $p) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-6 text-left">
                    <img src="/img/proker/<?= $p['foto'] ?? 'default_proker.jpg'; ?>" alt="<?= $p['nama_program']; ?>" class="w-12 h-12 object-cover rounded-md">
                </td>
                <td class="py-3 px-6 text-left font-medium text-gray-800">
                    <?= $p['nama_program']; ?>
                </td>
                <td class="py-3 px-6 text-left">
                    <?= $p['departemen']; ?>
                </td>
                <td class="py-3 px-6 text-center">
                    <?= $p['tanggal_pelaksanaan'] ? date('d M Y', strtotime($p['tanggal_pelaksanaan'])) : '-'; ?>
                </td>
                <td class="py-3 px-6 text-center">
                    <?php 
                        $statusClass = 'bg-gray-200 text-gray-600';
                        if($p['status'] == 'Sedang Berjalan') $statusClass = 'bg-blue-100 text-blue-600';
                        if($p['status'] == 'Terlaksana') $statusClass = 'bg-green-100 text-green-600';
                    ?>
                    <span class="<?= $statusClass; ?> py-1 px-3 rounded-full text-xs font-bold">
                        <?= $p['status']; ?>
                    </span>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center gap-2">
                        <a href="/admin/proker/edit/<?= $p['id']; ?>" class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200" title="Edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="/admin/proker/delete/<?= $p['id']; ?>" method="post" onsubmit="return confirm('Hapus program kerja ini?');">
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