<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800">Bank Soal & Arsip</h1>
    <a href="/admin/bank_soal/create" class="bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow flex items-center transition">
        <i class="fas fa-upload mr-2"></i> Upload Soal
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
                <th class="py-3 px-6 text-left">Mata Kuliah</th>
                <th class="py-3 px-6 text-center">Semester</th>
                <th class="py-3 px-6 text-left">Jenis & Tahun</th>
                <th class="py-3 px-6 text-center">File</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach($soal as $s) : ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-6 text-left font-bold text-gray-700">
                    <?= $s['mata_kuliah']; ?>
                    <span class="block text-xs text-gray-400 font-normal"><?= $s['dosen'] ?? '-'; ?></span>
                </td>
                <td class="py-3 px-6 text-center">
                    <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full text-xs font-bold">Sem <?= $s['semester']; ?></span>
                </td>
                <td class="py-3 px-6 text-left">
                    <span class="font-bold text-gray-600"><?= $s['jenis_ujian']; ?></span>
                    <span class="text-xs block text-gray-400">TA <?= $s['tahun_akademik']; ?></span>
                </td>
                <td class="py-3 px-6 text-center">
                    <a href="/uploads/bank_soal/<?= $s['file_soal']; ?>" target="_blank" class="text-red-500 hover:text-red-700 font-bold">
                        <i class="fas fa-file-pdf fa-lg"></i>
                    </a>
                </td>
                <td class="py-3 px-6 text-center">
                    <form action="/admin/bank_soal/delete/<?= $s['id']; ?>" method="post" onsubmit="return confirm('Hapus arsip soal ini?');">
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