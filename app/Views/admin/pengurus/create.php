<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Anggota</h2>

    <form action="/admin/pengurus/store" method="post" enctype="multipart/form-data">
        
        <!-- PERIODE (BARU) -->
        <div class="mb-4 bg-blue-50 p-4 rounded border border-blue-200">
            <label class="block text-blue-800 font-bold mb-2">Periode Kepengurusan</label>
            <select name="periode" id="periodeSelect" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500 bg-white font-bold">
                <option value="2025/2026">2025/2026 (Sistem Departemen)</option>
                <option value="2024/2025">2024/2025 (Sistem Divisi - Arsip)</option>
            </select>
            <p class="text-xs text-blue-600 mt-1">Pilihan Departemen/Divisi akan berubah sesuai periode.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Angkatan</label>
                <input type="number" name="angkatan" class="w-full px-3 py-2 border rounded" value="<?= date('Y'); ?>" required>
            </div>
        </div>

        <!-- PILIHAN STRUKTUR DINAMIS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
            
            <div>
                <label class="block text-gray-700 font-bold mb-2" id="labelDept">Departemen / Divisi Utama</label>
                <select name="departemen" id="deptSelect" class="w-full px-3 py-2 border rounded bg-white">
                    <option value="" disabled selected>-- Pilih --</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Sub Divisi (Opsional)</label>
                <select name="sub_divisi" id="subSelect" class="w-full px-3 py-2 border rounded bg-white" disabled>
                    <option value="">--</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Jabatan</label>
                <select name="jabatan" id="jabatanSelect" class="w-full px-3 py-2 border rounded bg-white" disabled>
                    <option value="">-- Pilih Struktur Dulu --</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Nomor Urut (Otomatis)</label>
                <input type="number" name="urutan" id="urutanInput" class="w-full px-3 py-2 border rounded bg-gray-100 font-bold" readonly>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Foto Profil</label>
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded bg-gray-50 text-sm">
        </div>

        <button type="submit" class="w-full bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Anggota
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

    let currentStruktur = struktur2026; // Default

    // FUNGSI GANTI STRUKTUR
    function loadStruktur(periode) {
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
    }

    // EVENT LISTENER PERIODE
    periodeSelect.addEventListener('change', function() {
        loadStruktur(this.value);
    });

    // EVENT LISTENER DEPARTEMEN
    deptSelect.addEventListener('change', function() {
        const selectedKey = this.value;
        const data = currentStruktur[selectedKey];

        // Sub Divisi
        subSelect.innerHTML = '<option value="">-- Tidak Ada --</option>';
        subSelect.disabled = false;
        if (data.sub_divisi.length > 0) {
            subSelect.innerHTML = '<option value="">-- Pilih Sub --</option>';
            data.sub_divisi.forEach(sub => {
                subSelect.innerHTML += `<option value="${sub}">${sub}</option>`;
            });
        } else {
             subSelect.disabled = true;
        }

        // Jabatan
        jabatanSelect.innerHTML = '<option value="">-- Pilih Jabatan --</option>';
        jabatanSelect.disabled = false;
        data.jabatan.forEach(jab => {
            jabatanSelect.innerHTML += `<option value="${jab}">${jab}</option>`;
        });

        urutanInput.value = data.base_urutan;
    });

    // LOGIKA URUTAN OTOMATIS
    jabatanSelect.addEventListener('change', function() {
        const selectedKey = deptSelect.value;
        const baseUrutan = currentStruktur[selectedKey].base_urutan;
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
        } else if (jabatan.includes('Kepala Divisi')) { // Kasus khusus sub-divisi di Dept
            tambahan = 5;
        }

        urutanInput.value = parseInt(baseUrutan) + tambahan;
    });

    // Init awal
    loadStruktur(periodeSelect.value);
</script>

<?= $this->endSection(); ?>