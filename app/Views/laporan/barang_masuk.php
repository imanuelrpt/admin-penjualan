<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="text-green-600 font-semibold text-lg flex items-center gap-2">
            <i class="fas fa-truck-loading"></i>
            <span>Laporan Barang Masuk</span>
        </div>
        <a href="<?= base_url('/dashboard') ?>" class="text-sm text-gray-600 hover:text-green-600 flex items-center">
            <i class="fas fa-home mr-1"></i> Dashboard
        </a>
    </nav>

    <!-- Konten -->
    <div class="max-w-5xl mx-auto bg-white p-6 mt-6 rounded shadow">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-700">Laporan Barang Masuk</h2>
            <a href="<?= base_url('/barangmasuk/cetak') ?>" target="_blank" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 shadow inline-flex items-center space-x-2">
                <i class="fas fa-file-pdf"></i>
                <span>Cetak PDF</span>
            </a>
        </div>

        <form action="<?= base_url('/laporan/barangmasuk') ?>" method="post" class="mb-6 flex flex-wrap gap-4">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Dari Tanggal</label>
                <input type="date" name="tanggal_mulai" value="<?= $tanggal_mulai ?>" class="border p-2 rounded">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Sampai Tanggal</label>
                <input type="date" name="tanggal_sampai" value="<?= $tanggal_sampai ?>" class="border p-2 rounded">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Tampilkan
                </button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full border bg-white">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">No Reg</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Kode Barang</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($barangMasuk) > 0): ?>
                        <?php foreach ($barangMasuk as $i => $bm): ?>
                            <tr class="text-gray-700">
                                <td class="px-4 py-2 border"><?= $i + 1 ?></td>
                                <td class="px-4 py-2 border"><?= esc($bm['no_reg_barang']) ?></td>
                                <td class="px-4 py-2 border"><?= esc($bm['tgl_input']) ?></td>
                                <td class="px-4 py-2 border"><?= esc($bm['kode_barang']) ?></td>
                                <td class="px-4 py-2 border"><?= esc($bm['nama_barang']) ?></td>
                                <td class="px-4 py-2 border"><?= esc($bm['jumlah']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
