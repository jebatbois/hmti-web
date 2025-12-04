<footer class="text-white pt-12 pb-8 border-t border-white/10 mt-auto relative overflow-hidden" 
        style="background-color: #0b121e;"> <div class="absolute top-0 right-0 w-64 h-64 rounded-full blur-3xl -mr-16 -mt-16 opacity-20" 
         style="background-color: #16a34a;"></div> <div class="absolute bottom-0 left-0 w-40 h-40 rounded-full blur-2xl -ml-10 -mb-10 opacity-10" 
         style="background-color: #3b82f6;"></div> <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            
            <div class="space-y-4">
                <h3 class="text-2xl font-extrabold flex items-center tracking-wide group">
                    HMTI <span class="text-green-500 ml-1">UMRAH</span>
                </h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Himpunan Mahasiswa Teknik Informatika<br>
                    Fakultas Teknik dan Teknologi Kemaritiman<br>
                    Universitas Maritim Raja Ali Haji
                </p>
                
                <div class="flex space-x-4 mt-4">
                    <a href="https://www.instagram.com/umrahhmti_/" target="_blank" 
                       class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-500 transition duration-300 group border border-white/5">
                        <i class="fab fa-instagram text-xl text-gray-300 group-hover:text-white transition transform group-hover:scale-110"></i>
                    </a>
                    
                    <a href="https://www.tiktok.com/@hmti.umrah" target="_blank" 
                       class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-black hover:border-gray-600 transition duration-300 group border border-white/5">
                        <i class="fab fa-tiktok text-xl text-gray-300 group-hover:text-white transition transform group-hover:scale-110"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold text-white mb-4 relative inline-block">
                    Menu
                    <span class="absolute -bottom-1 left-0 w-1/2 h-1 bg-green-500 rounded-full"></span>
                </h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="/profil" class="hover:text-green-400 hover:translate-x-1 transition-transform inline-block">Struktur Organisasi</a></li>
                    <li><a href="/proker" class="hover:text-green-400 hover:translate-x-1 transition-transform inline-block">Program Kerja</a></li>
                    <li><a href="/berita" class="hover:text-green-400 hover:translate-x-1 transition-transform inline-block">Berita & Kegiatan</a></li>
                    <li><a href="/bank-soal" class="hover:text-green-400 hover:translate-x-1 transition-transform inline-block">Bank Soal & Arsip</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold text-white mb-4 relative inline-block">
                    Interaksi
                    <span class="absolute -bottom-1 left-0 w-1/2 h-1 bg-green-500 rounded-full"></span>
                </h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="/mimbar" class="hover:text-green-400 hover:translate-x-1 transition-transform inline-block">Mimbar Aspirasi</a></li>
                    <li><a href="/kontak" class="hover:text-green-400 hover:translate-x-1 transition-transform inline-block">Kontak & Kritik Saran</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold text-white mb-4 relative inline-block">
                    Hubungi Kami
                    <span class="absolute -bottom-1 left-0 w-1/2 h-1 bg-green-500 rounded-full"></span>
                </h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-green-500"></i>
                        <span>Gedung FTTK, Ruang HMTI, Senggarang</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-green-500"></i>
                        <a href="mailto:hmti@umrah.ac.id" class="hover:text-white transition">hmti@umrah.ac.id</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-white/10 pt-6 mt-8 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
            <span class="mb-2 md:mb-0">&copy; <?= date('Y'); ?> HMTI UMRAH. All rights reserved.</span>
            <span>Made with <span class="text-green-500 animate-pulse">❤</span> & Code.</span>
        </div>
    </div>
</footer>