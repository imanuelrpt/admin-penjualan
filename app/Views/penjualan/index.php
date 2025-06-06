<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="text-xl font-bold text-blue-600 flex items-center space-x-2">
            <i class="fas fa-receipt"></i>
            <span>Transaksi Penjualan</span>
        </div>
        <a href="<?= base_url('/dashboard') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
            <i class="fas fa-home mr-1"></i> Dashboard
        </a>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-6xl mx-auto p-6">

        <!-- Header dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Transaksi</h2>
            <a href="<?= base_url('/penjualan/create') ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Penjualan
            </a>
        </div>

        <!-- Notifikasi -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded flex items-center space-x-2">
                <i class="fas fa-check-circle"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <!-- Tabel Transaksi -->
        <div class="overflow-x-auto bg-white rounded shadow border">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-blue-50 text-left text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">No Faktur</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Konsumen</th>
                        <th class="px-6 py-3 text-right">Total</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-800">
                    <?php if (count($penjualan) > 0): ?>
                        <?php foreach ($penjualan as $i => $p): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-3"><?= $i + 1 ?></td>
                                <td class="px-6 py-3"><?= esc($p['no_faktur']) ?></td>
                                <td class="px-6 py-3"><?= date('d-m-Y', strtotime($p['tgl_transaksi'])) ?></td>
                                <td class="px-6 py-3"><?= esc($p['nama']) ?></td>
                                <td class="px-6 py-3 text-right font-medium text-blue-600">
                                    Rp<?= number_format($p['total'], 0, ',', '.') ?>
                                </td>
                                <td class="px-6 py-3 text-center space-x-2">
                                    <a href="<?= base_url('/penjualan/' . $p['id']) ?>" class="text-blue-600 hover:underline text-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="<?= base_url('/penjualan/edit/' . $p['id']) ?>" class="text-green-600 hover:underline text-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('/penjualan/delete/' . $p['id']) ?>" onclick="return confirm('Yakin ingin menghapus transaksi ini?')" class="text-red-600 hover:underline text-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-6">Belum ada transaksi penjualan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>
