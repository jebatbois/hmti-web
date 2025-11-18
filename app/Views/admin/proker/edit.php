<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Program Kerja</h2>
        <a href="/admin/proker" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul><?php foreach(session()->get('errors') as $error) : ?><li>• <?= $error ?></li><?php endforeach ?></ul>
        </div>
    <?php endif ?>

    <form action="/admin/proker/update/<?= $proker['id']; ?>" method="post" enctype="multipart/form-data"> <!-- Tambah enctype --><div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Program</label>
            <input type="text" name="nama_program" class="w-full px-3 py-2 border rounded" value="<?= old('nama_program', $proker['nama_program']); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Departemen</label>
            <select name="departemen" class="w-full px-3 py-2 border rounded bg-white">
                <?php 
                $depts = ['Pengurus Inti', 'Departemen PPM', 'Departemen MTI', 'Departemen Litbang', 'Departemen Kewirausahaan'];
                foreach($depts as $d): 
                ?>
                    <option value="<?= $d; ?>" <?= (old('departemen', $proker['departemen']) == $d) ? 'selected' : ''; ?>><?= $d; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" class="w-full px-3 py-2 border rounded" value="<?= old('tanggal_pelaksanaan', $proker['tanggal_pelaksanaan']); ?>">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Status</label>
                <select name="status" class="w-full px-3 py-2 border rounded bg-white">
                    <?php foreach(['Rencana', 'Sedang Berjalan', 'Terlaksana'] as $s): ?>
                        <option value="<?= $s; ?>" <?= (old('status', $proker['status']) == $s) ? 'selected' : ''; ?>><?= $s; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Foto Program Kerja</label>
            <?php if($proker['foto']): ?>
                <div class="mb-2">
                    <img src="/img/proker/<?= $proker['foto']; ?>" alt="Foto Proker Saat Ini" class="w-32 h-32 object-cover rounded-md border border-gray-200 shadow-sm">
                    <p class="text-xs text-gray-500 mt-1">Foto saat ini.</p>
                </div>
            <?php endif; ?>
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded focus:outline-none bg-gray-50 text-sm">
            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti. Maksimal 5MB, format JPG, PNG, atau WebP.</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
            <textarea name="deskripsi" class="w-full px-3 py-2 border rounded h-32"><?= old('deskripsi', $proker['deskripsi']); ?></textarea>
        </div>

        <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Perubahan
        </button>
    </form>
</div>

<?= $this->endSection(); ?>