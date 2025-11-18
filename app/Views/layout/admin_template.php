<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel HMTI'; ?></title>
    <link rel="shortcut icon" type="image/jpeg" href="/img/hmti.jpg">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hmti: { primary: '#16a34a', dark: '#14532d' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-gray-900 text-white flex flex-col shadow-xl">
            <div class="h-16 flex items-center justify-center border-b border-gray-700 bg-gray-800">
                <span class="text-xl font-bold tracking-wider text-hmti-primary">ADMIN HMTI</span>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">
                
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 rounded-lg transition-colors <?= ($title == 'Dashboard') ? 'bg-hmti-primary text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' ?>">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <p class="px-4 text-xs font-semibold text-gray-500 uppercase mt-4 mb-2">Manajemen Data</p>

                <!-- Menu Program Kerja (DITAMBAHKAN) -->
                <a href="/admin/proker" class="flex items-center px-4 py-3 rounded-lg transition-colors <?= (strpos($title, 'Program') !== false) ? 'bg-hmti-primary text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' ?>">
                    <i class="fas fa-tasks w-6"></i>
                    <span class="font-medium">Program Kerja</span>
                </a>

                <a href="/admin/berita" class="flex items-center px-4 py-3 rounded-lg transition-colors <?= (strpos($title, 'Berita') !== false) ? 'bg-hmti-primary text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' ?>">
                    <i class="fas fa-newspaper w-6"></i>
                    <span class="font-medium">Berita & Artikel</span>
                </a>

                <!-- Menu Admin Only -->
                <?php if(session()->get('role') == 'admin') : ?>
                    
                    <a href="/admin/pengurus" class="flex items-center px-4 py-3 rounded-lg transition-colors <?= (strpos($title, 'Pengurus') !== false) ? 'bg-hmti-primary text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' ?>">
                        <i class="fas fa-users w-6"></i>
                        <span class="font-medium">Pengurus</span>
                    </a>

                    <a href="/admin/users" class="flex items-center px-4 py-3 rounded-lg transition-colors <?= (strpos($title, 'Pengguna') !== false) ? 'bg-hmti-primary text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' ?>">
                        <i class="fas fa-user-cog w-6"></i>
                        <span class="font-medium">Manajemen User</span>
                    </a>

                <?php endif; ?>

            </nav>

            <div class="p-4 border-t border-gray-800">
                <a href="/logout" class="flex items-center px-4 py-2 text-red-400 hover:bg-red-900/20 rounded-lg transition">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white shadow flex items-center justify-between px-6">
                <h2 class="text-xl font-bold text-gray-800"><?= $title; ?></h2>
                
                <div class="flex items-center">
                    <div class="text-right mr-3 hidden md:block">
                        <div class="text-sm font-bold text-gray-800">
                            Halo, <?= session()->get('nama'); ?>
                        </div>
                        <div class="text-xs text-gray-500 uppercase tracking-wide">
                            <?= session()->get('role'); ?>
                        </div>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-hmti-primary text-white flex items-center justify-center font-bold text-lg shadow-sm border-2 border-white">
                        <?= strtoupper(substr(session()->get('nama') ?? 'A', 0, 1)); ?>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <?= $this->renderSection('content'); ?>
            </main>
        </div>

    </div>

</body>
</html>