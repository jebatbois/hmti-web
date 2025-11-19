<footer class="bg-hmti-dark text-white pt-12 pb-8 border-t-4 border-hmti-accent mt-auto relative overflow-hidden">
    
    <!-- Dekorasi Background -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-hmti-primary opacity-5 rounded-full blur-3xl -mr-16 -mt-16"></div>
    <div class="absolute bottom-0 left-0 w-40 h-40 bg-hmti-accent opacity-5 rounded-full blur-2xl -ml-10 -mb-10"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- 
            LAYOUT HORIZONTAL (GRID 4 KOLOM)
            - md:grid-cols-2 : Di tablet jadi 2 baris (2 kiri, 2 kanan)
            - lg:grid-cols-4 : Di laptop jadi 1 baris panjang (4 kolom sejajar)
        -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            
            <!-- Kolom 1: Brand Identity -->
            <div class="space-y-4">
                <h3 class="text-2xl font-extrabold flex items-center tracking-wide">
                    HMTI FTTK
                </h3>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Himpunan Mahasiswa Teknik Informatika<br>
                    Fakultas Teknik dan Teknologi Kemaritiman<br>
                    Universitas Maritim Raja Ali Haji
                </p>
                
                <!-- SOCIAL MEDIA ICONS (UPDATE) -->
                <div class="flex space-x-4 mt-4">
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/umrahhmti_/" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-500 transition duration-300 group">
                        <i class="fab fa-instagram text-xl text-white group-hover:scale-110 transition transform"></i>
                    </a>
                    
                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@hmti.umrah" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-black hover:border hover:border-gray-700 transition duration-300 group">
                        <i class="fab fa-tiktok text-xl text-white group-hover:scale-110 transition transform"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Menu Utama -->
            <div>
                <h4 class="text-lg font-bold text-white mb-4 relative inline-block">
                    Menu
                    <span class="absolute -bottom-1 left-0 w-1/2 h-1 bg-hmti-accent rounded-full"></span>
                </h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="/profil" class="hover:text-hmti-accent hover:translate-x-1 transition-transform inline-block">Struktur Organisasi</a></li>
                    <li><a href="/proker" class="hover:text-hmti-accent hover:translate-x-1 transition-transform inline-block">Program Kerja</a></li>
                    <li><a href="/berita" class="hover:text-hmti-accent hover:translate-x-1 transition-transform inline-block">Berita & Kegiatan</a></li>
                    <li><a href="/bank-soal" class="hover:text-hmti-accent hover:translate-x-1 transition-transform inline-block">Bank Soal & Arsip</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Interaksi (Menu Baru) -->
            <div>
                <h4 class="text-lg font-bold text-white mb-4 relative inline-block">
                    Interaksi
                    <span class="absolute -bottom-1 left-0 w-1/2 h-1 bg-hmti-accent rounded-full"></span>
                </h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="/mimbar" class="hover:text-hmti-accent hover:translate-x-1 transition-transform inline-block">Mimbar Aspirasi</a></li>
                    <li><a href="/kontak" class="hover:text-hmti-accent hover:translate-x-1 transition-transform inline-block">Kontak & Kritik Saran</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak Info -->
            <div>
                <h4 class="text-lg font-bold text-white mb-4 relative inline-block">
                    Hubungi Kami
                    <span class="absolute -bottom-1 left-0 w-1/2 h-1 bg-hmti-accent rounded-full"></span>
                </h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-hmti-accent"></i>
                        <span>Gedung FTTK, Ruang HMTI, Senggarang</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-hmti-accent"></i>
                        <a href="mailto:hmti@umrah.ac.id" class="hover:text-white transition">hmti@umrah.ac.id</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright Bar -->
        <div class="border-t border-gray-700 pt-6 mt-8 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
            <span class="mb-2 md:mb-0">&copy; <?= date('Y'); ?> HMTI UMRAH. All rights reserved.</span>
            <span>Developed with <span class="text-red-500 animate-pulse">❤</span> by JebatBois.</span>
        </div>
    </div>
</footer>