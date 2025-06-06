<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-700 flex items-center gap-2">
                <i class="fas fa-box"></i> Form Barang
            </h1>
            <a href="<?= base_url('/barang') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="max-w-3xl mx-auto bg-white p-6 mt-10 rounded shadow">
        <h2 class="text-xl font-semibold mb-6 text-gray-800">Tambah Data Barang</h2>

        <form action="<?= base_url('/barang/save') ?>" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Barang</label>
                <input type="text" name="kode_barang" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Satuan</label>
                <input type="text" name="satuan" maxlength="10" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stok" min="0" required class="w-full border p-2 rounded">
            </div>

            <div class="col-span-1 md:col-span-2 text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
