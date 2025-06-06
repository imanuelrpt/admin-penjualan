<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Penjualan Jasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-r from-green-100 to-blue-100 flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md transition duration-300 ease-in-out transform hover:scale-[1.01]">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-700">📝 Register Admin</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/register/save') ?>" method="post" class="space-y-5">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Username</label>
                <div class="flex items-center border border-gray-300 rounded overflow-hidden focus-within:ring-2 focus-within:ring-green-400">
                    <span class="px-3 text-gray-500"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" required class="w-full p-2 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Password</label>
                <div class="flex items-center border border-gray-300 rounded overflow-hidden focus-within:ring-2 focus-within:ring-green-400">
                    <span class="px-3 text-gray-500"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" required class="w-full p-2 outline-none">
                </div>
            </div>

            <div>
            </div>

            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition font-medium">
                Daftar
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun? 
            <a href="<?= base_url('/login') ?>" class="text-blue-500 hover:underline">Login di sini</a>
        </p>
    </div>

</body>
</html>
