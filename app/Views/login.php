<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - HMTI</title>
    
    <link href="/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script> 
    
    <link rel="shortcut icon" type="image/jpeg" href="/img/hmti.png">
    
    </head>
<body class="bg-[#0f172a] h-screen flex items-center justify-center relative overflow-hidden">
    
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-green-500 opacity-10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-blue-500 opacity-10 rounded-full blur-3xl translate-y-1/2"></div>


    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md border-t-8 border-hmti-primary relative z-10">
        
        <div class="text-center mb-8">
            <img src="/img/hmti.png" alt="Logo" class="w-16 h-16 mx-auto mb-3 drop-shadow-md">
            <h1 class="text-3xl font-extrabold text-gray-900">Administrator</h1>
            <p class="text-gray-500 text-sm mt-1">Silakan masuk untuk mengelola website</p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                <i class="fas fa-exclamation-triangle mr-2"></i> <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/login/auth" method="post" class="space-y-4">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 uppercase tracking-wider">Username</label>
                <input type="text" name="username" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-hmti-primary focus:ring-4 focus:ring-green-100 transition bg-gray-50 text-gray-800" 
                       required autofocus>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2 uppercase tracking-wider">Password</label>
                <input type="password" name="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-hmti-primary focus:ring-4 focus:ring-green-100 transition bg-gray-50 text-gray-800" 
                       required>
            </div>
            
            <button type="submit" class="w-full bg-hmti-primary text-white font-bold py-3 px-4 rounded-xl hover:bg-hmti-dark transition duration-300 shadow-md shadow-hmti-primary/50 transform hover:-translate-y-0.5">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk Dashboard
            </button>
        </form>

        <div class="mt-8 text-center text-xs text-gray-400">
            &copy; <?= date('Y'); ?> Dinas MTI - HMTI UMRAH
        </div>
    </div>

</body>
</html>