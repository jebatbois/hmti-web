<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Upload Soal Baru</h2>
        <a href="/admin/bank_soal" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul><?php foreach(session()->get('errors') as $error) : ?><li>• <?= $error ?></li><?php endforeach ?></ul>
        </div>
    <?php endif ?>

    <form action="/admin/bank_soal/store" method="post" enctype="multipart/form-data">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" placeholder="Contoh: Algoritma Pemrograman" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Dosen Pengampu (Opsional)</label>
                <input type="text" name="dosen" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Semester</label>
                <select name="semester" class="w-full px-3 py-2 border rounded bg-white">
                    <?php for($i=1; $i<=8; $i++): ?>
                        <option value="<?= $i; ?>">Semester <?= $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Jenis Ujian</label>
                <select name="jenis_ujian" class="w-full px-3 py-2 border rounded bg-white">
                    <option value="UTS">UTS</option>
                    <option value="UAS">UAS</option>
                    <option value="Kuis">Kuis</option>
                    <option value="Tugas Besar">Tugas Besar</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Tahun Akademik</label>
                <input type="text" name="tahun_akademik" class="w-full px-3 py-2 border rounded" placeholder="2024/2025" required>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">File Soal (PDF)</label>
            <input type="file" name="file_soal" class="w-full px-3 py-2 border rounded bg-gray-50 text-sm" required>
            <p class="text-xs text-gray-500 mt-1">Format PDF/DOCX. Maksimal 5MB.</p>
        </div>

        <button type="submit" class="w-full bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow transition">
            Upload Arsip
        </button>
    </form>
</div>

<?= $this->endSection(); ?>