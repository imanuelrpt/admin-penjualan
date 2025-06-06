<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <i class="fas fa-info-circle"></i> Detail Barang
            </h1>
            <a href="<?= base_url('/barang') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
            <div>
                <span class="font-semibold">Kode Barang:</span>
                <p class="mt-1 text-gray-900"><?= esc($barang['kode_barang']) ?></p>
            </div>
            <div>
                <span class="font-semibold">Nama Barang:</span>
                <p class="mt-1 text-gray-900"><?= esc($barang['nama_barang']) ?></p>
            </div>
            <div>
                <span class="font-semibold">Satuan:</span>
                <p class="mt-1 text-gray-900"><?= esc($barang['satuan']) ?></p>
            </div>
            <div>
                <span class="font-semibold">Stok:</span>
                <p class="mt-1 text-gray-900"><?= esc($barang['stok']) ?></p>
            </div>
        </div>

        <div class="mt-8 text-right">
            <a href="<?= base_url('/barang/edit/' . $barang['id']) ?>" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-2">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="<?= base_url('/barang') ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

</body>
</html>
