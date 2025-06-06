<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Barang Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="text-lg font-semibold text-blue-600 flex items-center space-x-2">
            <i class="fas fa-box-open"></i>
            <span>Barang Masuk</span>
        </div>
        <a href="<?= base_url('/dashboard') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Dashboard
        </a>
    </nav>

    <!-- Konten -->
    <div class="p-6 max-w-6xl mx-auto">
        <a href="<?= base_url('/barangmasuk/create') ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 shadow">
            <i class="fas fa-plus mr-1"></i> Tambah Barang Masuk
        </a>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="mt-4 bg-green-100 text-green-700 p-3 rounded shadow-sm">
                <i class="fas fa-check-circle mr-1"></i> <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white border shadow-sm rounded">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">No. Reg</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Kode Barang</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barangMasuk as $i => $b): ?>
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="border px-4 py-2"><?= $i + 1 ?></td>
                            <td class="border px-4 py-2"><?= esc($b['no_reg_barang']) ?></td>
                            <td class="border px-4 py-2"><?= esc($b['tgl_input']) ?></td>
                            <td class="border px-4 py-2"><?= esc($b['kode_barang']) ?></td>
                            <td class="border px-4 py-2"><?= esc($b['nama_barang']) ?></td>
                            <td class="border px-4 py-2"><?= esc($b['jumlah']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
