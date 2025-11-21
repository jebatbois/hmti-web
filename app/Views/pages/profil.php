<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="relative pt-32 pb-24 md:pt-44 md:pb-32 overflow-hidden text-center text-white"
         style="background-color: #0b121e;"> <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"
         style="background-color: rgba(22, 163, 74, 0.15);"></div> <div class="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4 pointer-events-none"
         style="background-color: rgba(30, 64, 175, 0.15);"></div> <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>

    <div class="container mx-auto px-4 relative z-10">
        
        <div class="mb-8 animate-bounce-slow">
            <span class="inline-block font-extrabold px-8 py-2 rounded-full shadow-[0_0_15px_rgba(34,197,94,0.3)] border border-green-500/30 text-lg md:text-2xl backdrop-blur-md"
                  style="background-color: rgba(22, 163, 74, 0.1); color: #4ade80;">
                ✨ <?= $nama_kabinet; ?> ✨
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-lg tracking-tight text-white">
            Struktur Organisasi
        </h1>
        <p class="text-base md:text-xl text-gray-400 max-w-2xl mx-auto mb-10 font-medium leading-relaxed">
            Mengenal lebih dekat fungsionaris Himpunan Mahasiswa Teknik Informatika yang siap melayani dan berinovasi.
        </p>

       <form action="" method="get" class="relative z-50 inline-block group">
    
    <div class="flex items-center bg-[#1e293b] border border-white/10 rounded-full px-1 py-1 shadow-lg hover:border-green-500/50 transition-all duration-300">
        
        <label class="text-xs font-bold text-gray-400 ml-4 mr-2 tracking-wide uppercase">Periode:</label>
        
        <div class="relative">
            <select name="periode" onchange="this.form.submit()" 
                    class="appearance-none bg-transparent text-green-400 font-bold py-2 pl-2 pr-8 cursor-pointer focus:outline-none text-sm md:text-base">
                
                <?php foreach ($periode_list as $p) : ?>
                    <option value="<?= $p; ?>" 
                            class="bg-[#0f172a] text-gray-300 hover:bg-green-900 py-2" 
                            <?= ($p == $periode_aktif) ? 'selected' : ''; ?>>
                        <?= $p; ?>
                    </option>
                <?php endforeach; ?>
                
            </select>

            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2 text-green-500">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>

    </div>
</form>
    </div>
</section>

<div class="container mx-auto px-4 md:px-8 pb-24 -mt-20 relative z-20">
    
    <div class="bg-gray-50 rounded-[3rem] shadow-2xl p-8 md:p-12 border border-gray-100 min-h-screen">

        <?php if(!empty($inti)): ?>
        <div class="mb-24">
            
            <div class="text-center mb-16">
                <span class="text-green-600 font-bold tracking-widest uppercase text-sm mb-2 block">Himpunan Mahasiswa Teknik Informatika</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900">
                    Badan Pengurus Harian
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-green-400 to-yellow-400 mx-auto mt-4 rounded-full"></div>
            </div>

        <?php 
        $leaders = []; 
        $members = []; 

        foreach ($inti as $p) {
            if ($p['urutan'] <= 2) {
                $leaders[] = $p;
            } else {
                $members[] = $p;
            }
        }
        ?>

        <div class="flex flex-wrap justify-center gap-10 md:gap-16 mb-12 items-end">
            <?php foreach ($leaders as $p) : ?>
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden w-72 border-t-4 group relative hover:-translate-y-2 transition duration-300 md:scale-110 z-10"
                     style="border-color: #facc15;">
                    <div class="p-8 text-center">
                        <div class="relative w-40 h-40 mx-auto mb-6">
                            <?php if(!empty($p['foto']) && $p['foto'] != 'default.png'): ?>
                                <img src="/img/pengurus/<?= $p['foto']; ?>" alt="<?= $p['nama']; ?>" class="rounded-full w-full h-full object-cover border-4 border-white shadow-lg transition group-hover:scale-105">
                            <?php else: ?>
                                <div class="w-full h-full rounded-full flex items-center justify-center text-5xl font-bold text-white border-4 border-white shadow-lg"
                                     style="background-color: #facc15;">
                                    <?= strtoupper(substr($p['nama'], 0, 2)); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="font-extrabold text-gray-900 text-xl leading-tight mb-2"><?= $p['nama']; ?></h3>
                        <span class="inline-block font-bold text-xs px-4 py-1.5 rounded-full shadow-sm tracking-wide"
                              style="background-color: #facc15; color: #14532d;">
                            <?= $p['jabatan']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-wrap justify-center gap-8">
            <?php foreach ($members as $p) : ?>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden w-60 border-t-4 border-gray-100 hover:border-green-500 group relative hover:-translate-y-1 transition duration-300">
                    <div class="p-6 text-center">
                        <div class="relative w-28 h-28 mx-auto mb-4">
                            <?php if(!empty($p['foto']) && $p['foto'] != 'default.png'): ?>
                                <img src="/img/pengurus/<?= $p['foto']; ?>" alt="<?= $p['nama']; ?>" class="rounded-full w-full h-full object-cover border-4 border-green-50 group-hover:border-green-500 transition">
                            <?php else: ?>
                                <div class="w-full h-full rounded-full text-white flex items-center justify-center text-3xl font-bold border-4 border-white shadow"
                                     style="background-color: #16a34a;">
                                    <?= strtoupper(substr($p['nama'], 0, 2)); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="font-bold text-gray-800 text-base leading-tight mb-2"><?= $p['nama']; ?></h3>
                        <span class="inline-block text-[10px] px-3 py-1 rounded-full font-bold uppercase tracking-wider border border-green-100 bg-green-50 text-green-800">
                            <?= $p['jabatan']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php 
    if(!empty($departemen)) {
        foreach ($departemen as $nama_dept => $data_anggota) {
            renderSectionDepartemen($nama_dept, $data_anggota);
        }
    }

    function renderSectionDepartemen($nama_dept, $data_anggota) {
        if (empty($data_anggota)) return;
    ?>
        <div class="mb-20">
            <div class="flex items-center justify-center mb-10">
                <div class="bg-white border border-gray-200 shadow-sm rounded-full px-8 py-3 flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full animate-ping" style="background-color: #16a34a;"></div>
                    <h2 class="text-xl md:text-2xl font-black text-gray-800 uppercase tracking-wider text-center"><?= $nama_dept; ?></h2>
                    <div class="w-2 h-2 rounded-full animate-ping" style="background-color: #16a34a;"></div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-8">
                <?php foreach ($data_anggota as $p) : 
                    $jabatan = $p['jabatan'];
                    $isKadep = (strpos($jabatan, 'Koordinator') !== false) || (strpos($jabatan, 'Kepala Departemen') !== false) || (strpos($jabatan, 'Kadep') !== false);
                    $isKadiv = (strpos($jabatan, 'Kepala Divisi') !== false) || (strpos($jabatan, 'Ketua Divisi') !== false) || (strpos($jabatan, 'Kadiv') !== false);

                    $cardClass = 'bg-white border-gray-100';
                    $badgeText = '';
                    $badgeClass = '';
                    $avatarBg = '#16a34a'; // Hijau

                    if ($isKadep) {
                        $cardClass = 'bg-yellow-50 transform scale-105 z-10 shadow-lg ring-4 ring-white'; 
                        $badgeText = 'KADEP';
                        $badgeClass = 'bg-yellow-400 text-gray-900'; 
                        $avatarBg = '#facc15';
                    } elseif ($isKadiv) {
                        $cardClass = 'bg-green-50 border-green-200 shadow-md'; 
                        $badgeText = 'KADIV'; 
                        $badgeClass = 'bg-green-200 text-green-800';
                        $avatarBg = '#22c55e';
                    }
                ?>
                
                <div class="w-64 p-6 rounded-2xl border shadow-sm hover:shadow-xl transition duration-300 flex flex-col items-center text-center relative <?= $cardClass; ?>"
                     <?php if($isKadep) echo 'style="border-color: #facc15;"'; ?>>
                    
                    <?php if($badgeText): ?>
                        <div class="absolute top-0 right-0 text-[10px] font-bold px-3 py-1 rounded-bl-xl rounded-tr-xl <?= $badgeClass; ?>">
                            <?= $badgeText; ?>
                        </div>
                    <?php endif; ?>

                    <div class="w-24 h-24 rounded-full mb-4 shadow-sm overflow-hidden border-4 border-white">
                        <?php if(!empty($p['foto']) && $p['foto'] != 'default.png'): ?>
                            <img src="/img/pengurus/<?= $p['foto']; ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                             <div class="w-full h-full flex items-center justify-center text-white font-bold text-2xl"
                                  style="background-color: <?= $avatarBg; ?>">
                                <?= strtoupper(substr($p['nama'], 0, 2)); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <h4 class="font-bold text-gray-900 text-base leading-tight mb-1"><?= $p['nama']; ?></h4>
                    <p class="text-xs text-gray-500 mb-4 font-mono"><?= $p['angkatan']; ?></p>
                    
                    <div class="mt-auto w-full pt-4 border-t border-gray-200/50">
                        <p class="text-xs font-bold uppercase tracking-wide" style="color: #16a34a;"><?= $p['jabatan']; ?></p>
                        <?php if($p['sub_divisi']): ?>
                            <p class="text-[10px] text-gray-400 mt-1 tracking-wider uppercase">
                                <?= $p['sub_divisi']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php } ?>

</div>

<?= $this->endSection(); ?>