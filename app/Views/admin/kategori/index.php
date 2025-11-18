<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Label & Kategori</h1>
        <p class="text-sm text-gray-500">Kelola label untuk pengelompokan berita.</p>
    </div>
    
    <!-- Form Tambah Cepat -->
    <form action="/admin/kategori/store" method="post" class="flex gap-2 w-full md:w-auto">
        <input type="text" name="nama_kategori" placeholder="Nama Kategori Baru..." class="border px-3 py-2 rounded focus:outline-none focus:border-green-500" required>
        <select name="warna_label" class="border px-3 py-2 rounded bg-white">
            <option value="bg-green-600">Hijau</option>
            <option value="bg-blue-600">Biru</option>
            <option value="bg-red-600">Merah</option>
            <option value="bg-yellow-500">Kuning</option>
            <option value="bg-purple-600">Ungu</option>
            <option value="bg-gray-600">Abu-abu</option>
        </select>
        <button type="submit" class="bg-hmti-primary text-white px-4 py-2 rounded font-bold hover:bg-hmti-dark">
            <i class="fas fa-plus"></i>
        </button>
    </form>
</div>

<?php if(session()->getFlashdata('success')) : ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')) : ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                <th class="py-3 px-6 text-left">Nama Label</th>
                <th class="py-3 px-6 text-left">Preview</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($kategori as $k) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-6 text-left font-medium text-gray-800">
                    <?= $k['nama_kategori']; ?>
                </td>
                <td class="py-3 px-6 text-left">
                    <span class="<?= $k['warna_label']; ?> text-white py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">
                        <?= $k['nama_kategori']; ?>
                    </span>
                </td>
                <td class="py-3 px-6 text-center">
                    <!-- Simple Inline Edit Form Logic could go here, but for simplicity just Delete -->
                     <form action="/admin/kategori/delete/<?= $k['id']; ?>" method="post" class="inline-block" onsubmit="return confirm('Hapus kategori ini?');">
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>