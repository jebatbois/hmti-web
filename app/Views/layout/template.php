<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HMTI FTTK'; ?></title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpeg" href="/img/hmti.jpg">
    
    <!-- CSS LOKAL (Anti Down) -->
    <link href="/css/style.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body class="font-sans text-gray-700 flex flex-col min-h-screen bg-gray-50">
<!-- ... (kode navbar dan body sisanya tetap sama) ... -->
    <!-- Include Navbar -->
    <?= $this->include('layout/navbar'); ?>
    
    <!-- Konten Utama (Berubah-ubah) -->
    <main class="flex-grow">
        <?= $this->renderSection('content'); ?>
    </main>

    <!-- Include Footer -->
    <?= $this->include('layout/footer'); ?>

</body>
</html>