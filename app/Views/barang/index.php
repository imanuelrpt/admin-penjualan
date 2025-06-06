<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-blue-600 text-lg font-semibold flex items-center gap-2">
                <i class="fas fa-box"></i>
                <span>Data Barang</span>
            </div>
            <a href="<?= base_url('/dashboard') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container mx-auto p-6">
        <!-- Tombol Tambah -->
        <a href="<?= base_url('/barang/create') ?>" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">
            <i class="fas fa-plus mr-1"></i> Tambah Barang
        </a>

        <!-- Flash Message Success -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Flash Message Error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded shadow">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 border">No</th>
                        <th class="py-2 px-4 border">Kode Barang</th>
                        <th class="py-2 px-4 border">Nama</th>
                        <th class="py-2 px-4 border">Satuan</th>
                        <th class="py-2 px-4 border">Stok</th>
                        <th class="py-2 px-4 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($barang) > 0): ?>
                        <?php foreach ($barang as $i => $b): ?>
                            <tr class="border-t text-gray-700">
                                <td class="py-2 px-4 border"><?= $i + 1 ?></td>
                                <td class="py-2 px-4 border"><?= esc($b['kode_barang']) ?></td>
                                <td class="py-2 px-4 border"><?= esc($b['nama_barang']) ?></td>
                                <td class="py-2 px-4 border"><?= esc($b['satuan']) ?></td>
                                <td class="py-2 px-4 border"><?= esc($b['stok']) ?></td>
                                <td class="py-2 px-4 border text-center space-x-2">
                                    <a href="<?= base_url('/barang/' . $b['id']) ?>" class="text-blue-600 hover:underline">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="<?= base_url('/barang/edit/' . $b['id']) ?>" class="text-green-600 hover:underline">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('/barang/delete/' . $b['id']) ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data barang.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
