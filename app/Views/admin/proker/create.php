<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Program Kerja</h2>
        <a href="/admin/proker" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul><?php foreach(session()->get('errors') as $error) : ?><li>• <?= $error ?></li><?php endforeach ?></ul>
        </div>
    <?php endif ?>

    <form action="/admin/proker/store" method="post" enctype="multipart/form-data"> <!-- Tambah enctype --><div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Program</label>
            <input type="text" name="nama_program" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" value="<?= old('nama_program'); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Departemen Penanggung Jawab</label>
            <select name="departemen" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary bg-white">
                <option value="Pengurus Inti" <?= old('departemen') == 'Pengurus Inti' ? 'selected' : ''; ?>>Pengurus Inti</option>
                <option value="Departemen PPM" <?= old('departemen') == 'Departemen PPM' ? 'selected' : ''; ?>>Departemen PPM</option>
                <option value="Departemen MTI" <?= old('departemen') == 'Departemen MTI' ? 'selected' : ''; ?>>Departemen MTI</option>
                <option value="Departemen Litbang" <?= old('departemen') == 'Departemen Litbang' ? 'selected' : ''; ?>>Departemen Litbang</option>
                <option value="Departemen Kewirausahaan" <?= old('departemen') == 'Departemen Kewirausahaan' ? 'selected' : ''; ?>>Departemen Kewirausahaan</option>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" value="<?= old('tanggal_pelaksanaan'); ?>">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Status Saat Ini</label>
                <select name="status" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary bg-white">
                    <option value="Rencana" <?= old('status') == 'Rencana' ? 'selected' : ''; ?>>Rencana</option>
                    <option value="Sedang Berjalan" <?= old('status') == 'Sedang Berjalan' ? 'selected' : ''; ?>>Sedang Berjalan</option>
                    <option value="Terlaksana" <?= old('status') == 'Terlaksana' ? 'selected' : ''; ?>>Terlaksana</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Foto Program Kerja (Opsional)</label>
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded focus:outline-none bg-gray-50 text-sm">
            <p class="text-xs text-gray-500 mt-1">Maksimal 5MB, format JPG, PNG, atau WebP.</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Deskripsi Singkat</label>
            <textarea name="deskripsi" class="w-full px-3 py-2 border rounded h-32 focus:outline-none focus:border-hmti-primary"><?= old('deskripsi'); ?></textarea>
        </div>

        <button type="submit" class="w-full bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Program
        </button>
    </form>
</div>

<?= $this->endSection(); ?>