<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-700">Edit Barang</h1>
            <a href="<?= base_url('/barang') ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </nav>

    <!-- Form Edit -->
    <div class="max-w-xl mx-auto bg-white p-6 mt-8 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Form Edit Barang</h2>

        <form action="<?= base_url('/barang/update/' . $barang['id']) ?>" method="post" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Kode Barang</label>
                <input type="text" name="kode_barang" value="<?= esc($barang['kode_barang']) ?>" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= esc($barang['nama_barang']) ?>" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Satuan</label>
                <input type="text" name="satuan" value="<?= esc($barang['satuan']) ?>" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Stok</label>
                <input type="number" name="stok" value="<?= esc($barang['stok']) ?>" required class="w-full border p-2 rounded" min="0">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Simpan Perubahan
            </button>
        </form>
    </div>

</body>
</html>
