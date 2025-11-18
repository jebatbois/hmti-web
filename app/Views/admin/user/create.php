<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah User Baru</h2>

    <?php if(session()->get('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
            <?php foreach(session()->get('errors') as $error) : ?>
                <li>• <?= $error ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="/admin/users/store" method="post">
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" placeholder="Contoh: Budi Santoso" value="<?= old('nama'); ?>">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" name="username" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" placeholder="Tanpa spasi" value="<?= old('username'); ?>">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" placeholder="Minimal 6 karakter">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Role (Hak Akses)</label>
            <select name="role" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500 bg-white">
                <option value="editor">Editor (Hanya Kelola Berita)</option>
                <option value="admin">Administrator (Akses Penuh)</option>
            </select>
            <p class="text-xs text-gray-500 mt-1">*Admin bisa kelola user & pengurus. Editor hanya bisa posting berita.</p>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition">
                Simpan User
            </button>
            <a href="/admin/users" class="text-gray-600 hover:text-gray-800 text-sm font-bold">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>