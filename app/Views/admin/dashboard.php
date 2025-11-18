<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500 flex items-center">
        <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
            <i class="fas fa-newspaper fa-2x"></i>
        </div>
        <div>
            <p class="text-gray-500 text-sm font-medium">Total Berita</p>
            <h3 class="text-2xl font-bold text-gray-800"><?= $total_berita; ?></h3>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500 flex items-center">
        <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
            <i class="fas fa-users fa-2x"></i>
        </div>
        <div>
            <p class="text-gray-500 text-sm font-medium">Total Pengurus</p>
            <h3 class="text-2xl font-bold text-gray-800"><?= $total_pengurus; ?></h3>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500 flex items-center">
        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
            <i class="fas fa-clock fa-2x"></i>
        </div>
        <div>
            <p class="text-gray-500 text-sm font-medium">Waktu Server</p>
            <h3 class="text-lg font-bold text-gray-800"><?= date('H:i'); ?> WIB</h3>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 font-bold text-gray-700">
        Berita Terakhir Diposting
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm uppercase">
                    <th class="px-6 py-3 font-medium">Judul</th>
                    <th class="px-6 py-3 font-medium">Tanggal</th>
                    <th class="px-6 py-3 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach($berita_terbaru as $b) : ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800 font-medium"><?= $b['judul']; ?></td>
                    <td class="px-6 py-4 text-sm text-gray-500"><?= date('d/m/Y', strtotime($b['created_at'])); ?></td>
                    <td class="px-6 py-4 text-right">
                        <a href="/admin/berita/edit/<?= $b['id']; ?>" class="text-blue-500 hover:text-blue-700 text-sm font-bold">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>