<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Penjualan Jasa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center space-x-2">
            <i class="fas fa-chart-line text-blue-500 text-xl"></i>
            <h1 class="text-xl font-bold text-gray-800">Dashboard Penjualan</h1>
        </div>
        <a href="<?= base_url('/logout') ?>" class="flex items-center space-x-1 text-red-500 hover:text-red-700 transition">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </header>

    <!-- Konten -->
    <main class="p-6 max-w-6xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Selamat datang, <?= session()->get('username') ?>! 👋</h2>
            <p class="mt-2 text-gray-600">Silakan pilih menu di bawah untuk memulai.</p>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            <!-- Konsumen -->
            <a href="<?= base_url('/konsumen') ?>" class="group bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-blue-500">
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-200 transition">
                        <i class="fas fa-users text-blue-500 text-xl"></i>
                    </div>
                    <h3 class="text-gray-800 font-semibold">Konsumen</h3>
                    <p class="text-sm text-gray-500 mt-1">Manajemen data konsumen</p>
                </div>
            </a>

            <!-- Barang -->
            <a href="<?= base_url('/barang') ?>" class="group bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-green-500">
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3 group-hover:bg-green-200 transition">
                        <i class="fas fa-boxes text-green-500 text-xl"></i>
                    </div>
                    <h3 class="text-gray-800 font-semibold">Barang</h3>
                    <p class="text-sm text-gray-500 mt-1">Stok & satuan barang</p>
                </div>
            </a>

            <!-- Transaksi Penjualan -->
            <a href="<?= base_url('/penjualan') ?>" class="group bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-yellow-500">
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mb-3 group-hover:bg-yellow-200 transition">
                        <i class="fas fa-cash-register text-yellow-500 text-xl"></i>
                    </div>
                    <h3 class="text-gray-800 font-semibold">Penjualan</h3>
                    <p class="text-sm text-gray-500 mt-1">Transaksi penjualan barang</p>
                </div>
            </a>

            <!-- Transaksi Barang Masuk -->
            <a href="<?= base_url('/barangmasuk') ?>" class="group bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-indigo-500">
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3 group-hover:bg-indigo-200 transition">
                        <i class="fas fa-arrow-down text-indigo-500 text-xl"></i>
                    </div>
                    <h3 class="text-gray-800 font-semibold">Barang Masuk</h3>
                    <p class="text-sm text-gray-500 mt-1">Input stok ke gudang</p>
                </div>
            </a>

            <!-- Laporan -->
            <a href="<?= base_url('/laporan') ?>" class="group bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-purple-500">
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3 group-hover:bg-purple-200 transition">
                        <i class="fas fa-chart-pie text-purple-500 text-xl"></i>
                    </div>
                    <h3 class="text-gray-800 font-semibold">Laporan</h3>
                    <p class="text-sm text-gray-500 mt-1">Data & statistik</p>
                </div>
            </a>

        </div>
    </main>

</body>
</html>