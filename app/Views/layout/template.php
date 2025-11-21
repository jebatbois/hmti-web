<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HMTI FTTK'; ?></title>
    
    <link rel="shortcut icon" type="image/jpeg" href="/img/hmti.jpg">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Patrick+Hand&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // WARNA UTAMA HMTI (HIJAU)
                        hmti: {
                            primary: '#16a34a', 
                            dark:    '#14532d',
                            light:   '#dcfce7',
                            accent:  '#facc15',
                        },
                        // WARNA BERITA (BIRU)
                        news: {
                            primary: '#1e40af',
                            dark:    '#0f172a',
                            hover:   '#1e3a8a',
                            light:   '#eff6ff',
                        },
                        // WARNA BANK SOAL (UNGU)
                        academic: {
                            primary: '#7e22ce',
                            dark:    '#581c87',
                            light:   '#faf5ff',
                            accent:  '#db2777',
                        },
                        // WARNA MIMBAR (TEAL)
                        mimbar: {
                            primary: '#0d9488',
                            dark:    '#115e59',
                            light:   '#f0fdfa',
                            paper:   '#fefce8',
                        },
                        // WARNA KONTAK
                        contact: {
                            primary: '#16a34a',
                            dark:    '#0f172a',
                            icon:    '#22c55e',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        handwriting: ['"Patrick Hand"', 'cursive'],
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                    }
                }
            }
        }
    </script>

    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen overflow-x-hidden">

    <?= $this->include('layout/navbar'); ?>

    <main class="flex-grow">
        <?= $this->renderSection('content'); ?>
    </main>

    <?= $this->include('layout/footer'); ?>

    <script>
        // Script untuk Mobile Menu (Jika ada)
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");
        if(btn && menu) {
            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        }
    </script>
</body>
</html>