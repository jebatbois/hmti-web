<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Administrator</h1>
    <a href="/admin/users/create" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow flex items-center">
        <i class="fas fa-plus mr-2"></i> Tambah User
    </a>
</div>

<?php if(session()->getFlashdata('success')) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p><?= session()->getFlashdata('success'); ?></p>
    </div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')) : ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p><?= session()->getFlashdata('error'); ?></p>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Nama Lengkap
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Username
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Terdaftar
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $u) : ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                            <div class="w-full h-full rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-lg">
                                <?= strtoupper(substr($u['nama_lengkap'], 0, 1)); ?>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                <?= $u['nama_lengkap']; ?>
                                <?php if(session()->get('id') == $u['id']) echo '<span class="text-xs text-gray-500">(Anda)</span>'; ?>
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">@<?= $u['username']; ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap"><?= date('d M Y', strtotime($u['created_at'])); ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                    <?php if(session()->get('id') != $u['id']) : ?>
                        <form action="/admin/users/delete/<?= $u['id']; ?>" method="post" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    <?php else: ?>
                        <span class="text-gray-400 text-xs">Akun Aktif</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>