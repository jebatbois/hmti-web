<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="bg-hmti-light py-20 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-extrabold text-hmti-dark mb-4 mt-9">Bank Soal & Arsip Akademik</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Kumpulan soal UTS, UAS, dan materi kuliah tahun-tahun sebelumnya. Gunakan sebagai bahan referensi belajar.
        </p>
    </div>
</section>

<div class="container mx-auto px-6 py-12">
    
    <!-- FILTER & PENCARIAN -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-10 border border-gray-100">
        <form action="" method="get" class="flex flex-col md:flex-row gap-4">
            <div class="flex-grow">
                <input type="text" name="keyword" value="<?= $keyword; ?>" placeholder="Cari Mata Kuliah atau Dosen..." class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-hmti-primary">
            </div>
            <div class="w-full md:w-1/4">
                <select name="semester" class="w-full px-4 py-3 border rounded-lg bg-white focus:outline-none focus:border-hmti-primary">
                    <option value="">-- Semua Semester --</option>
                    <?php for($i=1; $i<=8; $i++): ?>
                        <option value="<?= $i; ?>" <?= ($semester == $i) ? 'selected' : ''; ?>>Semester <?= $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" class="bg-hmti-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-hmti-dark transition">
                <i class="fas fa-search mr-2"></i> Cari
            </button>
        </form>
    </div>

    <!-- LIST SOAL -->
    <?php if(empty($soal)): ?>
        <div class="text-center py-12">
            <div class="text-gray-300 text-6xl mb-4"><i class="fas fa-folder-open"></i></div>
            <p class="text-gray-500 text-lg">Belum ada arsip soal yang ditemukan.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach($soal as $s) : ?>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition border-l-4 border-hmti-primary flex justify-between items-center group">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded uppercase">
                                <?= $s['jenis_ujian']; ?>
                            </span>
                            <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded">
                                Sem <?= $s['semester']; ?>
                            </span>
                            <span class="text-xs text-gray-400">TA <?= $s['tahun_akademik']; ?></span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 group-hover:text-hmti-primary transition">
                            <?= $s['mata_kuliah']; ?>
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-chalkboard-teacher mr-1"></i> <?= $s['dosen'] ?? '-'; ?>
                        </p>
                    </div>
                    <div>
                        <a href="/uploads/bank_soal/<?= $s['file_soal']; ?>" target="_blank" class="bg-red-50 text-red-600 w-12 h-12 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition shadow-sm" title="Download PDF">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 flex justify-center">
            <div class="pagination-custom">
                <?= $pager->links('bank_soal', 'default_full') ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<style>
    .pagination-custom ul { display: flex; gap: 0.5rem; }
    .pagination-custom li a, .pagination-custom li span {
        display: inline-block; padding: 0.5rem 1rem; border-radius: 0.5rem;
        background-color: white; border: 1px solid #e5e7eb; color: #374151;
    }
    .pagination-custom li.active a { background-color: #16a34a; color: white; }
</style>

<?= $this->endSection(); ?>