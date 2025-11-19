<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Anggota</h2>
        <a href="/admin/pengurus" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Batal</a>
    </div>

    <form action="/admin/pengurus/update/<?= $p['id']; ?>" method="post" enctype="multipart/form-data">
        
        <!-- PERIODE (BARU) -->
        <div class="mb-4 bg-blue-50 p-4 rounded border border-blue-200">
            <label class="block text-blue-800 font-bold mb-2">Periode Kepengurusan</label>
            <select name="periode" id="periodeSelect" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500 bg-white font-bold">
                <option value="2025/2026" <?= ($p['periode'] == '2025/2026') ? 'selected' : ''; ?>>2025/2026 (Sistem Departemen)</option>
                <option value="2024/2025" <?= ($p['periode'] == '2024/2025') ? 'selected' : ''; ?>>2024/2025 (Sistem Divisi - Arsip)</option>
            </select>
            <p class="text-xs text-blue-600 mt-1">Pilihan Departemen/Divisi akan berubah sesuai periode.</p>
        </div>

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

        <!-- PILIHAN STRUKTUR -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
            
            <div>
                <label class="block text-gray-700 font-bold mb-2" id="labelDept">Departemen</label>
                <select name="departemen" id="deptSelect" class="w-full px-3 py-2 border rounded bg-white">
                     <!-- Initial Load from PHP $struktur -->
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
                    <!-- Diisi JS -->
                    <option value="<?= $p['sub_divisi']; ?>" selected><?= $p['sub_divisi']; ?></option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Jabatan</label>
                <select name="jabatan" id="jabatanSelect" class="w-full px-3 py-2 border rounded bg-white">
                    <!-- Diisi JS -->
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
    // DATA DARI PHP
    const struktur2026 = <?= json_encode($struktur_2026); ?>;
    const struktur2025 = <?= json_encode($struktur_2025); ?>;
    
    const periodeSelect = document.getElementById('periodeSelect');
    const deptSelect = document.getElementById('deptSelect');
    const subSelect = document.getElementById('subSelect');
    const jabatanSelect = document.getElementById('jabatanSelect');
    const urutanInput = document.getElementById('urutanInput');
    const labelDept = document.getElementById('labelDept');
    
    // Nilai Awal dari Database (PHP)
    const currentSub = "<?= $p['sub_divisi']; ?>";
    const currentJab = "<?= $p['jabatan']; ?>";
    
    let currentStruktur = <?= ($p['periode'] == '2024/2025') ? 'struktur2025' : 'struktur2026' ?>;

    // FUNGSI GANTI STRUKTUR (Load Dropdown Utama)
    function loadStruktur(periode) {
        // Hanya reset dropdown jika periode berubah dari aslinya, atau saat init
        // Tapi untuk edit, kita tidak ingin mereset nilai existing kecuali user mengganti periode
    }
    
    // EVENT LISTENER PERIODE: Ganti struktur data
    periodeSelect.addEventListener('change', function() {
        const periode = this.value;
        
        deptSelect.innerHTML = '<option value="" disabled selected>-- Pilih --</option>';
        subSelect.innerHTML = '<option value="">--</option>';
        subSelect.disabled = true;
        jabatanSelect.innerHTML = '<option value="">--</option>';
        jabatanSelect.disabled = true;

        if (periode.includes('2025') && !periode.includes('2026')) {
            currentStruktur = struktur2025;
            labelDept.innerText = "Divisi Utama";
        } else {
            currentStruktur = struktur2026;
            labelDept.innerText = "Departemen";
        }

        // Isi Dropdown Utama
        for (const key in currentStruktur) {
            const option = document.createElement('option');
            option.value = key;
            option.text = key;
            deptSelect.appendChild(option);
        }
    });

    function populateOptions(selectedDept) {
        const data = currentStruktur[selectedDept];
        if (!data) return;

        // Populate Sub Divisi
        let subHtml = '<option value="">-- Tidak Ada / Pilih --</option>';
        if (data.sub_divisi.length > 0) {
            data.sub_divisi.forEach(sub => {
                // Cek selected hanya jika belum diubah user (masih nilai awal db)
                // Atau lebih simpel: biarkan selected dikendalikan logic
                // Di sini kita cek strict equality dengan currentSub HANYA jika dropdown dept tidak berubah
                const isSelected = (sub === subSelect.value || sub === currentSub) ? 'selected' : '';
                subHtml += `<option value="${sub}" ${isSelected}>${sub}</option>`;
            });
        }
        subSelect.innerHTML = subHtml;
        subSelect.disabled = false;
        if(data.sub_divisi.length === 0) {
             subSelect.innerHTML = '<option value="">-- Tidak Ada --</option>';
             subSelect.disabled = true;
        }


        // Populate Jabatan
        let jabHtml = '<option value="">-- Pilih Jabatan --</option>';
        if (data.jabatan) {
            data.jabatan.forEach(jab => {
                const isSelected = (jab === jabatanSelect.value || jab === currentJab) ? 'selected' : '';
                jabHtml += `<option value="${jab}" ${isSelected}>${jab}</option>`;
            });
        }
        jabatanSelect.innerHTML = jabHtml;
        jabatanSelect.disabled = false;
    }

    // Jalankan saat halaman dimuat (untuk mengisi dropdown edit)
    // Kita perlu memanggil ini agar sub & jabatan terisi
    // Tapi deptSelect sudah terisi dari PHP.
    // Kita hanya perlu populate anak-anaknya.
    populateOptions(deptSelect.value);

    // Jalankan saat departemen diganti
    deptSelect.addEventListener('change', function() {
        // Reset selected values karena ganti dept
        subSelect.value = "";
        jabatanSelect.value = "";
        populateOptions(this.value);
        
        // Update urutan base
        const data = currentStruktur[this.value];
        if(data) urutanInput.value = data.base_urutan;
    });
    
    // Logika Urutan
    jabatanSelect.addEventListener('change', function() {
        const selectedKey = deptSelect.value;
        const data = currentStruktur[selectedKey];
        if(!data) return;
        
        const baseUrutan = data.base_urutan;
        const jabatan = this.value;
        
        let tambahan = 9; 
        if (jabatan.includes('Ketua Himpunan') || jabatan.includes('Ketua Divisi') || jabatan.includes('Kepala Departemen')) {
            tambahan = 1;
        } else if (jabatan.includes('Wakil')) {
            tambahan = 2;
        } else if (jabatan.includes('Sekretaris')) {
            tambahan = 3;
        } else if (jabatan.includes('Bendahara')) {
            tambahan = 4;
        } else if (jabatan.includes('Kepala Divisi')) { 
            tambahan = 5;
        } else if (jabatan.includes('Ahli')) {
            tambahan = 6;
        }

        urutanInput.value = parseInt(baseUrutan) + tambahan;
    });
</script>

<?= $this->endSection(); ?>