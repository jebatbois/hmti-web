<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Anggota</h2>
        <a href="/admin/pengurus" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul><?php foreach(session()->get('errors') as $error) : ?><li>• <?= $error ?></li><?php endforeach ?></ul>
        </div>
    <?php endif ?>

    <form action="/admin/pengurus/store" method="post" enctype="multipart/form-data">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" value="<?= old('nama'); ?>" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Angkatan</label>
                <input type="number" name="angkatan" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" value="<?= old('angkatan', date('Y')); ?>" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Departemen / Bagian</label>
            <select name="departemen" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary bg-white">
                <option value="Pengurus Inti">Pengurus Inti</option>
                <option value="Departemen Minat & Bakat">Departemen Minat & Bakat</option>
                <option value="Departemen PPM">Departemen PPM (Pengembangan & Pengabdian)</option>
                <option value="Departemen MTI">Departemen MTI (Media & TI)</option>
                <option value="Departemen Litbang">Departemen Litbang</option>
                <option value="Departemen Kewirausahaan">Departemen Kewirausahaan</option>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Jabatan</label>
                <input type="text" name="jabatan" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" placeholder="Contoh: Ketua, Staff Ahli..." value="<?= old('jabatan'); ?>" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Sub Divisi (Opsional)</label>
                <input type="text" name="sub_divisi" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" placeholder="Contoh: Divisi Kominfo" value="<?= old('sub_divisi'); ?>">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Nomor Urut (Sortir)</label>
                <input type="number" name="urutan" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-hmti-primary" placeholder="1, 2, 10, 100..." value="<?= old('urutan', 100); ?>" required>
                <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin atas posisinya.</p>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Foto Profil</label>
                <input type="file" name="foto" class="w-full px-3 py-2 border rounded focus:outline-none bg-gray-50 text-sm">
            </div>
        </div>

        <button type="submit" class="w-full bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Data
        </button>
    </form>
</div>

<?= $this->endSection(); ?>