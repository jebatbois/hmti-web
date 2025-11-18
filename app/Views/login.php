<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - HMTI</title>
    <script src="https://cdn.tailwindcss.com"></script>
      <link rel="shortcut icon" type="image/jpeg" href="/img/hmti.png">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border-t-4 border-green-600">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Login Administrator</h1>
            <p class="text-gray-500 text-sm">Silakan masuk untuk mengelola website HMTI</p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="/login/auth" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" name="username" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" required autofocus>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" required>
            </div>
            
            <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                Masuk Dashboard
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-gray-400">
            &copy; <?= date('Y'); ?> Dinas MTI - HMTI UMRAH
        </div>
    </div>

</body>
</html>