<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Anggota</h2>
        <a href="/admin/pengurus" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <form action="/admin/pengurus/update/<?= $p['id']; ?>" method="post" enctype="multipart/form-data">
        
        <!-- Nama & Angkatan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full px-3 py-2 border rounded" value="<?= old('nama', $p['nama']); ?>" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Angkatan</label>
                <input type="number" name="angkatan" class="w-full px-3 py-2 border rounded" value="<?= old('angkatan', $p['angkatan']); ?>" required>
            </div>
        </div>

        <!-- Departemen -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Departemen / Bagian</label>
            <select name="departemen" class="w-full px-3 py-2 border rounded bg-white">
                <?php 
                $depts = ['Pengurus Inti', 'Departemen PPM', 'Departemen MTI', 'Departemen Litbang', 'Departemen Kewirausahaan'];
                foreach($depts as $d): 
                ?>
                    <option value="<?= $d; ?>" <?= ($p['departemen'] == $d) ? 'selected' : ''; ?>><?= $d; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Jabatan & Sub Divisi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Jabatan</label>
                <input type="text" name="jabatan" class="w-full px-3 py-2 border rounded" value="<?= old('jabatan', $p['jabatan']); ?>" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Sub Divisi</label>
                <input type="text" name="sub_divisi" class="w-full px-3 py-2 border rounded" value="<?= old('sub_divisi', $p['sub_divisi']); ?>">
            </div>
        </div>

        <!-- Urutan & Foto -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Nomor Urut</label>
                <input type="number" name="urutan" class="w-full px-3 py-2 border rounded" value="<?= old('urutan', $p['urutan']); ?>" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Ganti Foto</label>
                <input type="file" name="foto" class="w-full px-3 py-2 border rounded bg-gray-50 text-sm">
                <span class="text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti.</span>
            </div>
        </div>

        <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Perubahan
        </button>
    </form>
</div>

<?= $this->endSection(); ?>