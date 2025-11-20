<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@300;600&display=swap" rel="stylesheet">
    <style>
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .font-inter { font-family: 'Inter', sans-serif; }
        .bg-animate {
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<!-- Gunakan min-h-screen agar bisa discroll jika layar pendek, py-10 untuk jarak aman -->
<body class="bg-gray-900 text-white min-h-screen flex flex-col items-center justify-center relative font-inter py-10">

    <!-- Background Aurora Gelap -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-green-900 to-blue-900 bg-animate opacity-80 z-0 fixed"></div>
    
    <!-- Konten Utama -->
    <div class="relative z-10 text-center px-6 w-full max-w-4xl mx-auto">
        
        <!-- Logo Kabinet -->
        <div class="mb-8 animate-pulse">
            <div class="w-24 h-24 md:w-32 md:h-32 mx-auto bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm border-2 border-white/20">
                <span class="text-4xl">🔒</span> 
            </div>
        </div>

        <h2 class="text-green-400 uppercase tracking-[0.3em] text-xs md:text-sm font-bold mb-2">The Next Chapter</h2>
        <h1 class="text-4xl md:text-7xl font-extrabold font-orbitron mb-6 text-transparent bg-clip-text bg-gradient-to-r from-white via-green-200 to-green-400 drop-shadow-lg leading-tight">
            HMTI 2025/2026
        </h1>
        
        <p class="text-gray-300 text-base md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            Persiapan menuju era baru Himpunan Mahasiswa Teknik Informatika. <br class="hidden md:block">
            Sinergi, Inovasi, dan Dedikasi segera hadir.
        </p>

        <!-- Countdown Timer -->
        <div class="flex flex-wrap justify-center gap-4 md:gap-6 mb-12" id="countdown">
            <div class="bg-black/30 backdrop-blur-md p-3 md:p-4 rounded-xl border border-white/10 min-w-[80px] md:min-w-[100px]">
                <span class="block text-2xl md:text-4xl font-bold" id="days">00</span>
                <span class="text-[10px] md:text-xs uppercase tracking-widest text-gray-400">Hari</span>
            </div>
            <div class="bg-black/30 backdrop-blur-md p-3 md:p-4 rounded-xl border border-white/10 min-w-[80px] md:min-w-[100px]">
                <span class="block text-2xl md:text-4xl font-bold" id="hours">00</span>
                <span class="text-[10px] md:text-xs uppercase tracking-widest text-gray-400">Jam</span>
            </div>
            <div class="bg-black/30 backdrop-blur-md p-3 md:p-4 rounded-xl border border-white/10 min-w-[80px] md:min-w-[100px]">
                <span class="block text-2xl md:text-4xl font-bold" id="minutes">00</span>
                <span class="text-[10px] md:text-xs uppercase tracking-widest text-gray-400">Menit</span>
            </div>
            <div class="bg-black/30 backdrop-blur-md p-3 md:p-4 rounded-xl border border-white/10 min-w-[80px] md:min-w-[100px]">
                <span class="block text-2xl md:text-4xl font-bold" id="seconds">00</span>
                <span class="text-[10px] md:text-xs uppercase tracking-widest text-gray-400">Detik</span>
            </div>
        </div>

        <!-- CONTAINER AKSI (Button & Link) -->
        <div class="flex flex-col items-center space-y-6 mb-12">
            
            <!-- Tombol Kembali -->
            <a href="/" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-gray-900 bg-green-400 hover:bg-green-300 transition duration-300 shadow-[0_0_20px_rgba(74,222,128,0.5)]">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>

            <!-- Link Lihat Arsip (Dibuat lebih jelas dan berjarak) -->
            <div class="bg-white/5 px-6 py-3 rounded-lg border border-white/10 backdrop-blur-sm">
                <p class="text-gray-400 text-sm mb-1">Ingin melihat pengurus sebelumnya?</p>
                <a href="/profil?periode=2024/2025" class="text-green-300 hover:text-white font-semibold text-sm underline decoration-green-500/50 hover:decoration-white transition-all flex items-center justify-center gap-2">
                    <i class="fas fa-history"></i> Lihat Arsip Kabinet Sahitya (2024/2025) &rarr;
                </a>
            </div>

        </div>
    </div>

    <!-- Footer Kecil (Posisi Relative agar tidak menimpa konten di layar kecil) -->
    <div class="relative z-10 text-center w-full text-gray-500 text-xs mt-auto">
        &copy; <?= date('Y'); ?> HMTI FTTK UMRAH. Stay Tuned.
    </div>

    <!-- FontAwesome untuk ikon arsip -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script>
        const targetDate = new Date("<?= $target_date; ?>").getTime();

        const timer = setInterval(function() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
            document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
            document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

            if (distance < 0) {
                clearInterval(timer);
                document.getElementById("countdown").innerHTML = "<div class='text-2xl font-bold text-green-400'>SEKARANG SAATNYA!</div>";
            }
        }, 1000);
    </script>

</body>
</html>