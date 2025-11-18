<nav class="bg-hmti-primary shadow-lg fixed w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
<div class="flex-shrink-0 flex items-center">
                <img src="/img/hmti.png" 
                     alt="Logo HMTI" 
                     class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white p-[2px] object-contain shadow-sm mr-3">
                
                <div class="flex flex-col">
                    <span class="font-bold text-white text-lg md:text-xl leading-none tracking-wide">
                        HMTI <span class="text-hmti-accent">UMRAH</span>
                    </span>
                    <span class="text-[10px] text-blue-100 leading-none hidden md:block mt-1">
                        Universitas Maritim Raja Ali Haji
                    </span>
                </div>
            </div>
            
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="text-white hover:text-hmti-accent font-medium transition">Beranda</a>
                <a href="/profil" class="text-white hover:text-hmti-accent font-medium transition">Profil</a>
                <a href="/berita" class="text-white hover:text-hmti-accent font-medium transition">Berita</a>
            </div>

            <div class="flex items-center md:hidden">
                <button onclick="toggleMenu()" class="text-white hover:text-hmti-accent focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-hmti-dark pb-4">
        <a href="/" class="block px-4 py-2 text-white hover:bg-hmti-primary">Beranda</a>
        <a href="/profil" class="block px-4 py-2 text-white hover:bg-hmti-primary">Profil</a>
        <a href="/berita" class="block px-4 py-2 text-white hover:bg-hmti-primary">Berita</a>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>