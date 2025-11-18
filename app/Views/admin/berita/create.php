<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tulis Berita Baru</h2>
        <a href="/admin/berita" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Kembali</a>
    </div>

    <!-- Error Validasi -->
    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul><?php foreach(session()->get('errors') as $error) : ?><li>• <?= $error ?></li><?php endforeach ?></ul>
        </div>
    <?php endif ?>

    <form action="/admin/berita/store" method="post" enctype="multipart/form-data">
        
        <!-- PILIHAN KATEGORI (Wajib Ada) -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Kategori / Label</label>
            <select name="kategori_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-hmti-primary bg-white">
                <option value="" disabled selected>-- Pilih Kategori --</option>
                <?php foreach($kategori as $k): ?>
                    <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <p class="text-xs text-gray-500 mt-1">Pilih label yang sesuai untuk berita ini.</p>
        </div>

        <!-- Judul -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Judul Artikel</label>
            <input type="text" name="judul" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-hmti-primary" placeholder="Masukkan judul berita yang menarik..." value="<?= old('judul'); ?>">
        </div>

        <!-- Upload Gambar -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Gambar Utama (Cover)</label>
            <input type="file" name="gambar" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none bg-gray-50 text-sm">
            <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG/WebP. Max: 10MB.</p>
        </div>

        <!-- Isi Berita -->
        <div class="mb-8">
            <label class="block text-gray-700 font-bold mb-2">Isi Berita</label>
            <!-- Textarea tinggi untuk konten -->
            <textarea name="isi" class="w-full px-4 py-3 border border-gray-300 rounded-lg h-64 focus:outline-none focus:border-hmti-primary" placeholder="Tulis isi berita di sini..."><?= old('isi'); ?></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-3 px-8 rounded-lg shadow transition duration-300">
                <i class="fas fa-paper-plane mr-2"></i> Terbitkan Berita
            </button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>