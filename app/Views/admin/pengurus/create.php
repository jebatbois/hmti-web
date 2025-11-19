<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
            
            <div>
                <label class="block text-gray-700 font-bold mb-2">Departemen</label>
                <select name="departemen" id="deptSelect" class="w-full px-3 py-2 border rounded bg-white focus:outline-none focus:border-hmti-primary">
                    <option value="" disabled selected>-- Pilih Departemen --</option>
                    <?php foreach ($struktur as $dept => $detail) : ?>
                        <option value="<?= $dept; ?>" data-base="<?= $detail['base_urutan']; ?>">
                            <?= $dept; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Sub Divisi</label>
                <select name="sub_divisi" id="subSelect" class="w-full px-3 py-2 border rounded bg-white focus:outline-none focus:border-hmti-primary" disabled>
                    <option value="">-- Pilih Departemen Dulu --</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Jabatan</label>
                <select name="jabatan" id="jabatanSelect" class="w-full px-3 py-2 border rounded bg-white focus:outline-none focus:border-hmti-primary" disabled>
                    <option value="">-- Pilih Departemen Dulu --</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">
                    Nomor Urut 
                    <span class="text-xs font-normal text-gray-500">(Otomatis)</span>
                </label>
                <input type="number" name="urutan" id="urutanInput" class="w-full px-3 py-2 border rounded bg-gray-100 text-gray-600 font-bold" readonly>
                <p class="text-xs text-gray-400 mt-1">Bisa diedit manual jika perlu.</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Foto Profil</label>
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded focus:outline-none bg-gray-50 text-sm">
        </div>

        <button type="submit" class="w-full bg-hmti-primary hover:bg-hmti-dark text-white font-bold py-2 px-4 rounded shadow transition">
            Simpan Anggota
        </button>
    </form>
</div>

<script>
    const strukturData = <?= json_encode($struktur); ?>;
    const deptSelect = document.getElementById('deptSelect');
    const subSelect = document.getElementById('subSelect');
    const jabatanSelect = document.getElementById('jabatanSelect');
    const urutanInput = document.getElementById('urutanInput');

    deptSelect.addEventListener('change', function() {
        const selectedDept = this.value;
        const data = strukturData[selectedDept];

        subSelect.innerHTML = '<option value="">-- Tidak Ada / Pilih --</option>';
        subSelect.disabled = false;
        if (data.sub_divisi.length > 0) {
            data.sub_divisi.forEach(sub => {
                subSelect.innerHTML += `<option value="${sub}">${sub}</option>`;
            });
        } else {
             subSelect.innerHTML = '<option value="" selected>-- Tidak Ada Sub Divisi --</option>';
        }

        jabatanSelect.innerHTML = '<option value="">-- Pilih Jabatan --</option>';
        jabatanSelect.disabled = false;
        data.jabatan.forEach(jab => {
            jabatanSelect.innerHTML += `<option value="${jab}">${jab}</option>`;
        });

        urutanInput.value = data.base_urutan;
        urutanInput.readOnly = false;
    });

    jabatanSelect.addEventListener('change', function() {
        const selectedDept = deptSelect.value;
        const baseUrutan = strukturData[selectedDept].base_urutan;
        const jabatan = this.value;
        
        let tambahan = 9; 

        // Update Logika Urutan yang Lebih Spesifik
        if (jabatan === 'Kepala Departemen' || jabatan.includes('Ketua') || jabatan.includes('Koordinator')) {
            tambahan = 1;
        } else if (jabatan.includes('Wakil')) {
            tambahan = 2;
        } else if (jabatan.includes('Sekretaris')) {
            tambahan = 3;
        } else if (jabatan.includes('Bendahara')) {
            tambahan = 4;
        } else if (jabatan.includes('Kepala Divisi')) { 
            tambahan = 5; // Urutan untuk Kepala Divisi
        } else if (jabatan.includes('Ahli')) {
            tambahan = 6;
        }

        urutanInput.value = parseInt(baseUrutan) + tambahan;
    });
</script>

<?= $this->endSection(); ?>