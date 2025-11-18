<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HMTI FT-TM'; ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hmti: {
                            primary: '#16a34a',   // Hijau (Main)
                            dark: '#14532d',      // Hijau Tua (Footer/Hover)
                            accent: '#facc15',    // Kuning (Highlight/Button)
                            marine: '#1e40af',    // Biru (Maritim)
                            light: '#f0fdf4',     // Hijau pudar (Background)
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
    /* Utility untuk menyembunyikan scrollbar tapi tetap bisa di-scroll */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>

</head>
<body class="font-sans text-gray-700 flex flex-col min-h-screen">

    <?= $this->include('layout/navbar'); ?>
    
    <main class="flex-grow">
        <?= $this->renderSection('content'); ?>
    </main>

    <?= $this->include('layout/footer'); ?>

</body>
</html>