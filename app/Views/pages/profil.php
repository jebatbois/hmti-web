<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="bg-hmti-light pt-24 pb-12 md:pt-32 md:pb-16 text-center px-4">
    <div class="container mx-auto">
        <h1 class="text-3xl md:text-4xl font-extrabold text-hmti-dark mb-2 md:mb-4">Struktur Organisasi</h1>
        <p class="text-sm md:text-lg text-gray-600 max-w-2xl mx-auto">
            Mengenal lebih dekat fungsionaris Himpunan Mahasiswa Teknik Informatika.
        </p>
    </div>
</section>

<div class="container mx-auto px-4 md:px-6 pb-20">

<div class="mb-12 md:mb-16 mt-8 md:mt-12">
        
        <div class="text-center relative mb-8 md:mb-10">
            <div class="flex flex-col md:flex-row items-center justify-center">
                <span class="hidden md:block h-1 w-16 bg-hmti-accent rounded mr-6"></span>
                
                <h2 class="text-2xl md:text-4xl font-extrabold text-hmti-primary uppercase tracking-widest leading-snug px-2">
                    Badan Pengurus<br class="md:hidden" /> Harian HMTI
                </h2>
                
                <span class="hidden md:block h-1 w-16 bg-hmti-accent rounded ml-6"></span>
            </div>
            <div class="block md:hidden w-24 h-1 bg-hmti-accent mx-auto mt-4 rounded-full"></div>
        </div>
        
<!--- Pengurus Inti Section ---->
<div class="mb-12 md:mb-16">
        <div class="flex items-center justify-center mb-2 md:mb-10">
            <span class="hidden md:block h-1 w-12 bg-hmti-accent rounded mr-4"></span>
            
            <h2 class="text-2xl md:text-3xl font-extrabold text-hmti-primary text-center uppercase tracking-wider leading-snug">
                Pengurus Inti
            </h2>
            
            <span class="hidden md:block h-1 w-12 bg-hmti-accent rounded ml-4"></span>
        </div>
        
        <div class="block md:hidden w-20 h-1 bg-hmti-accent mx-auto mb-8 rounded-full"></div>

        <?php
        // LOGIKA PEMISAHAN DATA
        // Kita pisahkan array $inti menjadi dua bagian
        $leaders = []; // Untuk Ketua & Wakil
        $members = []; // Untuk Sekkum & Bendum

        if(!empty($inti)) {
            foreach ($inti as $p) {
                // Asumsi: Di database, Ketua urutan 1, Wakil urutan 2
                if ($p['urutan'] <= 2) {
                    $leaders[] = $p;
                } else {
                    $members[] = $p;
                }
            }
        }
        ?>

        <div class="flex flex-wrap justify-center gap-8 md:gap-12 mb-8 items-end">
            <?php foreach ($leaders as $p) : ?>
                <div class="bg-white rounded-xl shadow-xl overflow-hidden w-44 md:w-72 border-t-4 border-hmti-accent group relative hover:-translate-y-2 transition duration-300 md:scale-110 z-10">
                    <div class="p-5 md:p-8 text-center">
                        <div class="relative w-24 h-24 md:w-32 md:h-32 mx-auto mb-4">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($p['nama']); ?>&background=facc15&color=14532d&size=128" 
                                    alt="<?= $p['nama']; ?>" 
                                    class="rounded-full w-full h-full object-cover border-4 border-white shadow-lg group-hover:border-hmti-accent transition">
                        </div>
                        <h3 class="font-extrabold text-gray-800 text-lg md:text-xl mb-1 leading-tight"><?= $p['nama']; ?></h3>
                        <span class="inline-block bg-hmti-accent text-hmti-dark font-bold text-xs md:text-sm px-4 py-1 rounded-full shadow-sm mt-2">
                            <?= $p['jabatan']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-wrap justify-center gap-6 md:gap-8">
            <?php foreach ($members as $p) : ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden w-40 md:w-64 border-t-4 border-gray-200 hover:border-hmti-primary group relative hover:-translate-y-1 transition duration-300">
                    <div class="p-4 md:p-6 text-center">
                        <div class="relative w-20 h-20 md:w-24 md:h-24 mx-auto mb-3">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($p['nama']); ?>&background=16a34a&color=fff&size=128" 
                                    alt="<?= $p['nama']; ?>" 
                                    class="rounded-full w-full h-full object-cover border-4 border-hmti-light group-hover:border-hmti-primary transition">
                        </div>
                        <h3 class="font-bold text-gray-800 text-sm md:text-lg mb-1 leading-tight"><?= $p['nama']; ?></h3>
                        <span class="inline-block bg-hmti-light text-hmti-primary text-[10px] md:text-xs px-3 py-1 rounded-full font-semibold border border-hmti-primary/20">
                            <?= $p['jabatan']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<!--- Departemen Sections ---->
    <?php 
    function renderDepartemen($nama_dept, $data_anggota) {
        if (empty($data_anggota)) return;
    ?>
        <div class="mb-12">
            <div class="bg-hmti-marine text-white rounded-lg p-3 md:p-4 mb-6 md:mb-8 shadow-md relative overflow-hidden">
                <div class="absolute top-0 right-0 -mr-4 -mt-4 w-16 h-16 bg-hmti-accent rounded-full opacity-20"></div>
                <h2 class="text-lg md:text-xl font-bold text-center uppercase tracking-wide"><?= $nama_dept; ?></h2>
                <p class="text-center text-xs md:hidden mt-1 opacity-80">(Geser ke samping untuk melihat anggota)</p>
            </div>

            <div class="flex overflow-x-auto md:grid md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 pb-4 no-scrollbar snap-x snap-mandatory">
                <?php foreach ($data_anggota as $p) : 
                    $isKoord = strpos($p['jabatan'], 'Koordinator') !== false;
                ?>
                
                <div class="snap-center flex-shrink-0 min-w-[70%] md:min-w-0 w-full bg-white rounded-lg shadow border border-gray-100 flex flex-col items-center p-5 text-center relative 
                    <?= $isKoord ? 'bg-yellow-50 border-hmti-accent' : '' ?>">
                    
                    <?php if($isKoord): ?>
                        <div class="absolute top-0 right-0 bg-hmti-accent text-hmti-dark text-[10px] font-bold px-2 py-1 rounded-bl-lg">
                            KOORDINATOR
                        </div>
                    <?php endif; ?>

                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($p['nama']); ?>&background=<?= $isKoord ? 'facc15' : '1e40af' ?>&color=fff&size=128" 
                         class="w-16 h-16 md:w-20 md:h-20 rounded-full mb-3 object-cover shadow-sm">
                    
                    <h4 class="font-bold text-gray-800 text-sm"><?= $p['nama']; ?></h4>
                    <p class="text-xs text-gray-500 mb-2"><?= $p['angkatan']; ?></p>
                    
                    <div class="mt-auto">
                        <p class="text-hmti-primary text-xs font-semibold"><?= $p['jabatan']; ?></p>
                        <?php if($p['sub_divisi']): ?>
                            <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider border-t pt-1 border-gray-200">
                                <?= $p['sub_divisi']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php } ?>

    <?= renderDepartemen('Departemen PPM', $ppm ?? []); ?>
    <?= renderDepartemen('Departemen MTI', $mti ?? []); ?>
    <?= renderDepartemen('Departemen Litbang', $litbang ?? []); ?>
    <?= renderDepartemen('Departemen Kewirausahaan', $kwu ?? []); ?>

</div>

<?= $this->endSection(); ?>