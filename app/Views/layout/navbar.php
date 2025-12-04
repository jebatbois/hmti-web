<?php
$uri = service('uri');
$currentSegment = $uri->getSegment(1) ?: 'home';
?>

<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 text-white pt-4">
    
    <div id="nav-container" class="mx-auto max-w-[95%] rounded-full px-6 lg:px-8 transition-all duration-500 bg-[#0b121e]/80 backdrop-blur-md border border-white/10 shadow-lg">
        <div class="flex justify-between h-16 items-center">
            
            <div class="flex-shrink-0 flex items-center group cursor-pointer">
                <a href="/" class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-green-500/20 rounded-full blur-md group-hover:bg-green-500/40 transition duration-300"></div>
                        <img src="/img/hmti.png" alt="Logo HMTI" class="relative w-9 h-9 object-contain drop-shadow-md transform group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg tracking-wide leading-none group-hover:text-green-400 transition drop-shadow-md font-sans">
                            HMTI <span class="text-green-500">UMRAH</span>
                        </span>
                    </div>
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-1">
                <?php 
                $menus = [
                    'home' => 'Beranda',
                    'profil' => 'Profil',
                    'proker' => 'Proker',
                    'berita' => 'Berita',
                    'bank-soal' => 'Bank Soal',
                    'mimbar' => 'Mimbar',
                    'kontak' => 'Kontak'
                ];
                
                foreach($menus as $slug => $label): 
                    $isActive = ($currentSegment == $slug) || ($slug == 'home' && $currentSegment == '');
                    
                    // Style Aktif: Teks Hijau + Border Bawah
                    // Style Tidak Aktif: Teks Abu-abu -> Hover Putih
                    $activeClass = $isActive 
                        ? 'text-green-400 font-bold bg-white/5' 
                        : 'text-gray-300 hover:text-white hover:bg-white/5';
                ?>
                    <a href="<?= ($slug == 'home') ? '/' : '/'.$slug; ?>" 
                       class="px-4 py-1.5 rounded-full text-sm transition-all duration-300 <?= $activeClass; ?>">
                        <?= $label; ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="flex items-center md:hidden">
                <button onclick="toggleMenu()" class="text-gray-300 hover:text-white focus:outline-none p-2 hover:bg-white/10 rounded-full transition">
                    <svg id="menuIcon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg id="closeIcon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden absolute top-24 left-4 right-4 bg-[#0b121e] rounded-2xl shadow-2xl border border-white/10 overflow-hidden transition-all duration-300 transform origin-top scale-95 opacity-0 z-50">
        <div class="p-2 space-y-1">
            <?php foreach($menus as $slug => $label): 
                $isActive = ($currentSegment == $slug) || ($slug == 'home' && $currentSegment == '');
            ?>
                <a href="<?= ($slug == 'home') ? '/' : '/'.$slug; ?>" 
                   class="block px-4 py-3 rounded-xl text-center font-medium transition-all duration-200 <?= $isActive ? 'bg-green-600 text-white font-bold shadow-lg' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                   <?= $label; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>

<script>
    const navContainer = document.getElementById('nav-container');
    const navbar = document.getElementById('navbar');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    let isMenuOpen = false;

    // EFEK SCROLL: Navbar Transformasi
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            // Mode Scroll: Full Width, Dark Solid Background
            navbar.classList.remove('pt-4');
            
            navContainer.classList.remove('max-w-[95%]', 'rounded-full', 'bg-[#0b121e]/80', 'border-white/10');
            navContainer.classList.add('max-w-full', 'rounded-none', 'bg-[#0b121e]', 'shadow-xl', 'border-b', 'border-white/5');
            
            // Sedikit transparan saat scroll agar efek blur terlihat
            navContainer.style.backgroundColor = "rgba(11, 18, 30, 0.95)";
        } else {
            // Mode Top: Floating Pill
            navbar.classList.add('pt-4');
            
            navContainer.classList.add('max-w-[95%]', 'rounded-full', 'bg-[#0b121e]/80', 'border-white/10');
            navContainer.classList.remove('max-w-full', 'rounded-none', 'bg-[#0b121e]', 'shadow-xl', 'border-b', 'border-white/5');
            
            // Reset opacity
            navContainer.style.backgroundColor = "rgba(11, 18, 30, 0.8)"; 
        }
    });

    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.remove('scale-95', 'opacity-0');
                mobileMenu.classList.add('scale-100', 'opacity-100');
            }, 10);
            
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            mobileMenu.classList.remove('scale-100', 'opacity-100');
            mobileMenu.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);

            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    }
</script>