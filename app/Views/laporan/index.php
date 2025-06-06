<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white p-4 shadow-md flex justify-between items-center">
        <div class="text-blue-600 font-semibold text-lg flex items-center gap-2">
            <i class="fas fa-file-alt"></i>
            <span>Laporan Sistem</span>
        </div>
        <a href="<?= base_url('/dashboard') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
            <i class="fas fa-home mr-1"></i> Dashboard
        </a>
    </nav>

    <!-- Main Content -->
    <div class="max-w-3xl mx-auto mt-8 bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Pilih Jenis Laporan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="<?= base_url('/laporan/penjualan') ?>" class="p-6 bg-blue-100 rounded hover:bg-blue-200 transition text-center font-semibold text-blue-800 shadow">
                📊 Laporan Penjualan
            </a>
            <a href="<?= base_url('/laporan/barangmasuk') ?>" class="p-6 bg-green-100 rounded hover:bg-green-200 transition text-center font-semibold text-green-800 shadow">
                📦 Laporan Barang Masuk
            </a>
        </div>
    </div>

</body>
</html>
