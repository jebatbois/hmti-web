<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Anggota</h2>
        <a href="/admin/pengurus" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <form action="/admin/pengurus/update/<?= $p['id']; ?>" method="post" enctype="multipart/form-data">
        
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
            
            <div>
                <label class="block text-gray-700 font-bold mb-2">Departemen</label>
                <select name="departemen" id="deptSelect" class="w-full px-3 py-2 border rounded bg-white">
                    <?php foreach ($struktur as $dept => $detail) : ?>
                        <option value="<?= $dept; ?>" <?= ($p['departemen'] == $dept) ? 'selected' : ''; ?>>
                            <?= $dept; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Sub Divisi</label>
                <select name="sub_divisi" id="subSelect" class="w-full px-3 py-2 border rounded bg-white">
                    <option value="<?= $p['sub_divisi']; ?>" selected><?= $p['sub_divisi']; ?></option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Jabatan</label>
                <select name="jabatan" id="jabatanSelect" class="w-full px-3 py-2 border rounded bg-white">
                    <option value="<?= $p['jabatan']; ?>" selected><?= $p['jabatan']; ?></option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Nomor Urut</label>
                <input type="number" name="urutan" id="urutanInput" class="w-full px-3 py-2 border rounded bg-white" value="<?= old('urutan', $p['urutan']); ?>">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Ganti Foto</label>
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded bg-gray-50 text-sm">
            <span class="text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti.</span>
        </div>

        <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Perubahan
        </button>
    </form>
</div>

<script>
    const strukturData = <?= json_encode($struktur); ?>;
    
    const deptSelect = document.getElementById('deptSelect');
    const subSelect = document.getElementById('subSelect');
    const jabatanSelect = document.getElementById('jabatanSelect');
    
    const currentSub = "<?= $p['sub_divisi']; ?>";
    const currentJab = "<?= $p['jabatan']; ?>";

    function populateOptions(selectedDept) {
        const data = strukturData[selectedDept];
        if (!data) return;

        let subHtml = '<option value="">-- Tidak Ada / Pilih --</option>';
        if (data.sub_divisi.length > 0) {
            data.sub_divisi.forEach(sub => {
                const isSelected = (sub === currentSub) ? 'selected' : '';
                subHtml += `<option value="${sub}" ${isSelected}>${sub}</option>`;
            });
        }
        subSelect.innerHTML = subHtml;

        let jabHtml = '<option value="">-- Pilih Jabatan --</option>';
        if (data.jabatan) {
            data.jabatan.forEach(jab => {
                const isSelected = (jab === currentJab) ? 'selected' : '';
                jabHtml += `<option value="${jab}" ${isSelected}>${jab}</option>`;
            });
        }
        jabatanSelect.innerHTML = jabHtml;
    }

    populateOptions(deptSelect.value);

    deptSelect.addEventListener('change', function() {
        populateOptions(this.value);
        subSelect.value = "";
        jabatanSelect.value = "";
    });
</script>

<?= $this->endSection(); ?>