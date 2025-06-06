<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Barang Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white p-4 shadow-md flex justify-between items-center">
        <div class="text-blue-600 font-semibold text-lg flex items-center gap-2">
            <i class="fas fa-boxes"></i>
            <span>Input Barang Masuk</span>
        </div>
        <a href="<?= base_url('/barangmasuk') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </nav>

    <!-- Form -->
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Tambah Barang Masuk</h2>

        <form action="<?= base_url('/barangmasuk/save') ?>" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">No. Reg Barang</label>
                <input type="text" name="no_reg_barang" required class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Input</label>
                <input type="date" name="tgl_input" required class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
            </div>



            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah</label>
                <input type="number" name="jumlah" min="1" required class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
            </div>

                        <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Barang</label>
                <select name="id_barang" required class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
                    <option value="">-- Pilih Barang --</option>
                    <?php foreach ($barang as $b): ?>
                        <option value="<?= $b['id'] ?>">
                            <?= $b['kode_barang'] ?> - <?= $b['nama_barang'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="md:col-span-2 pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                    <i class="fas fa-save mr-2"></i> Simpan Barang Masuk
                </button>
            </div>
        </form>
    </div>

</body>
</html>
