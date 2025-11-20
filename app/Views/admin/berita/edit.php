<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Berita</h2>
        <a href="/admin/berita" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <!-- Error Validasi -->
    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul><?php foreach(session()->get('errors') as $error) : ?><li>• <?= $error ?></li><?php endforeach ?></ul>
        </div>
    <?php endif ?>

    <form action="/admin/berita/update/<?= $berita['id']; ?>" method="post" enctype="multipart/form-data">
        
        <!-- PILIHAN KATEGORI -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Kategori / Label</label>
            <select name="kategori_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-hmti-primary bg-white">
                <?php foreach($kategori as $k): ?>
                    <!-- Gunakan operator ?? untuk keamanan jika kategori_id null -->
                    <option value="<?= $k['id']; ?>" <?= (($berita['kategori_id'] ?? '') == $k['id']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Judul -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Judul Artikel</label>
            <input type="text" name="judul" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-hmti-primary" value="<?= old('judul', $berita['judul']); ?>">
        </div>

        <!-- Penulis (FIXED) -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Penulis</label>
            <!-- Tambahkan operator ?? '' agar tidak error jika kolom belum ada -->
            <input type="text" name="penulis" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-hmti-primary" value="<?= old('penulis', $berita['penulis'] ?? ''); ?>" placeholder="Nama Penulis">
        </div>

        <!-- Upload Gambar -->
        <div class="mb-6 flex gap-6">
            <div class="w-1/4">
                <label class="block text-xs text-gray-500 mb-1">Gambar Saat Ini:</label>
                <img src="<?= $berita['gambar'] ? '/img/berita/'.$berita['gambar'] : 'https://via.placeholder.com/150' ?>" class="w-full rounded border p-1">
            </div>
            <div class="w-3/4">
                <label class="block text-gray-700 font-bold mb-2">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none bg-gray-50 text-sm">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
            </div>
        </div>


        <!-- Isi Berita -->
        <div class="mb-8">
            <label class="block text-gray-700 font-bold mb-2">Isi Berita</label>
            <textarea name="isi" class="w-full px-4 py-3 border border-gray-300 rounded-lg h-64 focus:outline-none focus:border-hmti-primary"><?= old('isi', $berita['isi']); ?></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow transition duration-300">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>