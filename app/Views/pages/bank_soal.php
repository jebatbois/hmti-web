<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-28 md:pt-44 md:pb-36 overflow-hidden text-center text-white"
         style="background-color: #0b121e;"> <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"
         style="background-color: rgba(126, 34, 206, 0.15);"></div> <div class="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4 pointer-events-none"
         style="background-color: rgba(219, 39, 119, 0.15);"></div> <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>

    <div class="container mx-auto px-4 relative z-10">
        
        <div class="mb-6 animate-bounce-slow">
            <span class="inline-block font-extrabold px-6 py-2 rounded-full shadow-[0_0_15px_rgba(147,51,234,0.4)] border border-purple-500/30 text-sm md:text-base backdrop-blur-md"
                  style="background-color: rgba(126, 34, 206, 0.2); color: #d8b4fe;">
                📚 Repository Akademik
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-2xl tracking-tight">
            Bank Soal & Arsip
        </h1>
        
        <p class="text-purple-100 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed opacity-90">
            Akses kumpulan soal UTS, UAS, dan referensi tugas akhir untuk menunjang prestasi akademik mahasiswa.
        </p>
    </div>
</section>

<section class="bg-gray-50 min-h-screen pb-24 relative z-20">
    
    <div class="container mx-auto px-4 md:px-8 relative z-30 -mt-10 mb-16">
        <div class="max-w-5xl mx-auto bg-white p-5 rounded-2xl shadow-2xl border border-gray-100">
            
            <form action="" method="get" class="flex flex-col md:flex-row gap-4 items-center">
                
                <div class="relative w-full md:w-1/2">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="keyword" value="<?= $keyword; ?>" 
                           placeholder="Cari Mata Kuliah atau Dosen..." 
                           class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-100 transition text-gray-700">
                </div>

                <div class="relative w-full md:w-1/3">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-filter text-gray-400"></i>
                    </div>
                    <select name="semester" class="w-full pl-12 pr-10 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-100 transition text-gray-700 appearance-none cursor-pointer">
                        <option value="">Semua Semester</option>
                        <?php for($i=1; $i<=8; $i++): ?>
                            <option value="<?= $i; ?>" <?= ($semester == $i) ? 'selected' : ''; ?>>Semester <?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <button type="submit" class="w-full md:w-auto bg-purple-700 text-white px-8 py-3.5 rounded-xl font-bold hover:bg-purple-800 transition shadow-lg flex items-center justify-center gap-2 transform active:scale-95">
                    <span>Cari Arsip</span>
                </button>

            </form>
        </div>
    </div>

    <div class="container mx-auto px-4 md:px-8">

        <?php if(empty($soal)): ?>
            <div class="text-center py-20 border-2 border-dashed border-gray-300 rounded-[2rem] bg-white mt-8">
                <div class="inline-block p-6 rounded-full bg-purple-50 text-purple-300 mb-4 animate-pulse">
                    <i class="fas fa-folder-open text-6xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Arsip Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba gunakan kata kunci lain atau ganti filter semester.</p>
            </div>
        <?php else: ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <?php foreach($soal as $s) : ?>
                    
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-purple-200 transition-all duration-300 group relative overflow-hidden">
                        
                        <div class="absolute top-0 right-0 w-24 h-24 bg-purple-50 rounded-bl-full -mr-12 -mt-12 transition-transform group-hover:scale-150"></div>

                        <div class="relative z-10 flex justify-between items-start">
                            <div class="pr-4">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="bg-purple-100 text-purple-700 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wide border border-purple-200">
                                        <?= $s['jenis_ujian']; ?>
                                    </span>
                                    <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2.5 py-1 rounded-md border border-gray-200">
                                        SEM <?= $s['semester']; ?>
                                    </span>
                                </div>

                                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-purple-700 transition leading-snug mb-2">
                                    <?= $s['mata_kuliah']; ?>
                                </h3>

                                <div class="space-y-1">
                                    <p class="text-sm text-gray-500 flex items-center">
                                        <i class="fas fa-user-tie w-5 text-purple-400"></i> 
                                        <?= $s['dosen'] ?? '-'; ?>
                                    </p>
                                    <p class="text-sm text-gray-500 flex items-center">
                                        <i class="fas fa-calendar-alt w-5 text-purple-400"></i> 
                                        Tahun Ajaran <?= $s['tahun_akademik']; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="flex-shrink-0">
                                <a href="/uploads/bank_soal/<?= $s['file_soal']; ?>" target="_blank" 
                                   class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center hover:bg-purple-600 hover:text-white transition-all shadow-sm hover:shadow-lg group-hover:scale-110"
                                   title="Download Dokumen">
                                    <i class="fas fa-cloud-download-alt text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

            <div class="mt-16 flex justify-center">
                <div class="pagination-modern">
                    <?= $pager->links('bank_soal', 'default_full') ?>
                </div>
            </div>

        <?php endif; ?>

    </div>
</section>

<style>
    .pagination-modern ul { 
        display: flex; 
        gap: 0.5rem; 
        justify-content: center;
        flex-wrap: wrap;
    }
    .pagination-modern li a, .pagination-modern li span {
        display: inline-flex; 
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%; /* Bulat */
        background-color: white; 
        border: 1px solid #e5e7eb;
        color: #6b7280; 
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    /* Warna Aktif: Ungu */
    .pagination-modern li.active a, .pagination-modern li.active span {
        background-color: #7e22ce; /* Purple-700 */
        color: white;
        border-color: #7e22ce;
        box-shadow: 0 4px 10px rgba(126, 34, 206, 0.3);
        transform: scale(1.1);
    }
    .pagination-modern li a:hover:not(.active) {
        background-color: #f3f4f6;
        color: #7e22ce;
        border-color: #d8b4fe;
    }
</style>

<?= $this->endSection(); ?>