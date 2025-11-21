<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

<section class="relative pt-32 pb-24 md:pt-44 md:pb-36 overflow-hidden text-center text-white"
         style="background-color: #0b121e;"> <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"
         style="background-color: rgba(20, 184, 166, 0.15);"></div> <div class="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4 pointer-events-none"
         style="background-color: rgba(234, 179, 8, 0.1);"></div> <div class="absolute top-0 left-0 w-full h-full bg-[url('/img/pattern.png')] opacity-5"></div>

    <div class="container mx-auto px-4 relative z-10">
        
        <div class="mb-6 animate-bounce-slow">
            <span class="inline-block font-extrabold px-6 py-2 rounded-full shadow-[0_0_15px_rgba(20,184,166,0.4)] border border-teal-500/30 text-sm md:text-base backdrop-blur-md"
                  style="background-color: rgba(20, 184, 166, 0.1); color: #5eead4;">
                📣 Your Voice Matters
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-2xl tracking-tight">
            Mimbar Bebas
        </h1>
        
        <p class="text-teal-100 text-lg md:text-xl max-w-3xl mx-auto mb-10 font-medium leading-relaxed opacity-90">
            Ruang ekspresi mahasiswa Informatika. Sampaikan aspirasi, salam, pantun, atau unek-unek secara bebas dan bertanggung jawab.
        </p>
        
        <a href="#form-aspirasi" class="inline-flex items-center bg-white text-teal-900 font-bold px-8 py-4 rounded-full shadow-xl hover:bg-teal-50 transition transform hover:-translate-y-1 group">
            <i class="fas fa-pen-nib mr-3 text-teal-600 group-hover:-rotate-12 transition"></i> Tulis Aspirasi
        </a>
    </div>
</section>

<section class="py-20 bg-gray-50 relative overflow-hidden" 
         style="background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 24px 24px;">
    
    <div class="container mx-auto px-4 md:px-8 relative z-10">
        
        <?php if(session()->getFlashdata('success')) : ?>
            <div class="max-w-3xl mx-auto bg-teal-50 border-l-4 border-teal-500 text-teal-800 p-4 rounded-r shadow-md mb-10 flex items-center">
                <i class="fas fa-check-circle text-2xl mr-4"></i>
                <div>
                    <p class="font-bold">Terkirim!</p>
                    <p class="text-sm"><?= session()->getFlashdata('success'); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')) : ?>
            <div class="max-w-3xl mx-auto bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-r shadow-md mb-10 flex items-center animate-pulse">
                <i class="fas fa-ban text-2xl mr-4"></i>
                <div>
                    <p class="font-bold">Ups, Ditolak!</p>
                    <p class="text-sm"><?= session()->getFlashdata('error'); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if(empty($aspirasi)): ?>
            
            <div class="flex justify-center py-12">
                <div class="bg-white p-12 rounded-[2rem] shadow-sm text-center max-w-lg w-full border-4 border-dashed border-gray-200">
                    <div class="text-gray-300 mb-6">
                        <i class="far fa-comment-dots text-7xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Papan Masih Kosong</h3>
                    <p class="text-gray-500">Jadilah orang pertama yang menempelkan pesan di sini!</p>
                </div>
            </div>

        <?php else: ?>

            <div class="relative group">
                
                <button onclick="scrollMimbar(-1)" class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -ml-6 z-30 bg-white text-gray-700 w-14 h-14 rounded-full shadow-xl hover:bg-teal-600 hover:text-white transition items-center justify-center border border-gray-100">
                    <i class="fas fa-arrow-left text-xl"></i>
                </button>
                <button onclick="scrollMimbar(1)" class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 -mr-6 z-30 bg-white text-gray-700 w-14 h-14 rounded-full shadow-xl hover:bg-teal-600 hover:text-white transition items-center justify-center border border-gray-100">
                    <i class="fas fa-arrow-right text-xl"></i>
                </button>

                <div id="mimbarSlider" class="flex overflow-x-auto snap-x snap-mandatory gap-8 pb-16 pt-8 px-4 no-scrollbar scroll-smooth">
                    
                    <?php foreach($aspirasi as $index => $a) : 
                        // Variasi Rotasi & Warna
                        $rotates = ['rotate-1', '-rotate-1', 'rotate-2', '-rotate-2', 'rotate-0'];
                        $colors = ['bg-yellow-100', 'bg-blue-100', 'bg-green-100', 'bg-pink-100', 'bg-purple-100'];
                        
                        // Pilih rotasi acak
                        $randRotate = $rotates[array_rand($rotates)];
                        
                        // Gunakan warna dari DB jika ada, jika tidak gunakan array colors berurutan
                        $bgColor = $a['warna_bg'] ? $a['warna_bg'] : $colors[$index % count($colors)];
                    ?>
                        
                        <div class="snap-center flex-shrink-0 w-[85%] md:w-[360px] <?= $bgColor; ?> p-8 rounded-sm shadow-md hover:shadow-2xl transition duration-300 transform <?= $randRotate; ?> hover:scale-105 hover:rotate-0 relative flex flex-col justify-between h-80 border-b-2 border-black/5 group-card">
                            
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-32 h-10 bg-white/30 backdrop-blur-sm rotate-1 shadow-sm border-x border-white/40 z-10"></div>

                            <div class="absolute top-6 right-6 text-black/5 text-6xl font-serif leading-none">”</div>
                            
                            <div class="flex-grow overflow-y-auto no-scrollbar mt-2 mb-4 relative z-10 pr-2">
                                <p class="text-gray-800 text-xl leading-relaxed font-handwriting font-medium">
                                    <?= nl2br(esc($a['isi_aspirasi'])); ?>
                                </p>
                            </div>
                            
                            <div class="flex justify-between items-end border-t border-black/10 pt-4 mt-auto">
                                <div>
                                    <span class="block font-bold text-gray-900 text-sm font-sans">
                                        <?= esc($a['nama_pengirim'] ?: 'Anonim'); ?>
                                    </span>
                                    <?php if($a['angkatan']): ?>
                                        <span class="inline-block mt-1 text-[10px] font-bold text-gray-600 bg-white/40 px-2 py-0.5 rounded-full border border-black/5 font-sans">
                                            Angkatan <?= esc($a['angkatan']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <span class="text-[10px] text-gray-500 font-sans bg-white/40 px-2 py-1 rounded font-mono">
                                    <?= date('d M', strtotime($a['created_at'])); ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>


        <div id="form-aspirasi" class="max-w-5xl mx-auto mt-20">
            <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
                
                <div class="hidden md:block w-2/5 bg-slate-50 p-10 border-r border-slate-100 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-teal-400 to-blue-500"></div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center mr-3 text-sm"><i class="fas fa-shield-alt"></i></span>
                        Aturan Main
                    </h3>
                    
                    <ul class="text-sm text-gray-600 space-y-4 leading-relaxed">
                        <li class="flex items-start"><i class="fas fa-check-circle text-teal-500 mt-1 mr-3"></i> Gunakan bahasa yang sopan, santai, dan asik.</li>
                        <li class="flex items-start"><i class="fas fa-times-circle text-red-500 mt-1 mr-3"></i> Dilarang mengandung SARA, Hate Speech, atau Kata Kasar.</li>
                        <li class="flex items-start"><i class="fas fa-robot text-blue-500 mt-1 mr-3"></i> Sistem Auto-Filter aktif 24/7 untuk menyaring pesan.</li>
                        <li class="flex items-start"><i class="fas fa-user-secret text-gray-800 mt-1 mr-3"></i> Boleh anonim, tapi tulislah sesuatu yang bertanggung jawab.</li>
                    </ul>

                    <div class="mt-10 p-5 bg-yellow-50 rounded-2xl border border-yellow-100 text-xs text-yellow-800 leading-relaxed italic">
                        "Kebebasan berekspresi dibatasi oleh hak orang lain untuk merasa aman dan nyaman."
                    </div>
                </div>

                <div class="w-full md:w-3/5 p-8 md:p-12">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Suarakan Pikiranmu!</h2>
                        <p class="text-gray-500">Pesan akan tampil secara publik di dinding ini.</p>
                    </div>

                    <form action="/mimbar/kirim" method="post" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Nama / Samaran</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" name="nama_pengirim" 
                                           class="w-full pl-10 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-teal-500 focus:ring-4 focus:ring-teal-50 transition text-gray-700" 
                                           placeholder="Si Fulan (Anonim)" value="<?= old('nama_pengirim'); ?>">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Angkatan (Opsional)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <input type="number" name="angkatan" 
                                           class="w-full pl-10 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-teal-500 focus:ring-4 focus:ring-teal-50 transition text-gray-700" 
                                           placeholder="2023" value="<?= old('angkatan'); ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-wider">Isi Aspirasi</label>
                            <div class="relative">
                                <textarea name="isi_aspirasi" 
                                          class="w-full p-5 bg-gray-50 border border-gray-200 rounded-xl h-40 focus:bg-white focus:outline-none focus:border-teal-500 focus:ring-4 focus:ring-teal-50 transition resize-none font-handwriting text-xl text-gray-700 leading-relaxed" 
                                          placeholder="Tulis sesuatu yang keren di sini..." required><?= old('isi_aspirasi'); ?></textarea>
                                <div class="absolute bottom-4 right-4 text-gray-300 text-sm">
                                    <i class="fas fa-pen-fancy"></i>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-teal-600 text-white font-bold py-4 rounded-xl hover:bg-teal-700 transition shadow-lg transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2 group">
                            <span>Tempel di Mimbar</span> 
                            <i class="fas fa-paper-plane group-hover:rotate-12 transition"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</section>

<style>
    .font-handwriting { font-family: 'Patrick Hand', cursive; }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    function scrollMimbar(direction) {
        const container = document.getElementById('mimbarSlider');
        const scrollAmount = container.offsetWidth / 2; 
        container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }
</script>

<?= $this->endSection(); ?>