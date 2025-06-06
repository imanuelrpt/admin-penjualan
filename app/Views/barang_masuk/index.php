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
    <nav class="bg-white shadow-md sticky top-0 z-10 p-4 flex justify-between items-center">
        <div class="text-lg font-semibold text-blue-600 flex items-center gap-2">
            <i class="fas fa-box-open"></i>
            <span>Barang Masuk</span>
        </div>
        <a href="<?= base_url('/dashboard') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Dashboard
        </a>
    </nav>

    <!-- Form Cetak PDF -->
    <div class="p-6 max-w-6xl mx-auto">
        <form action="<?= base_url('/barangmasuk/cetak') ?>" method="get" target="_blank" class="flex flex-wrap items-center gap-2 mb-6">
            <input type="date" name="tanggal_awal" required class="border p-2 rounded text-sm" value="<?= date('Y-m-01') ?>">
            <span class="text-gray-500 text-sm">s/d</span>
            <input type="date" name="tanggal_akhir" required class="border p-2 rounded text-sm" value="<?= date('Y-m-d') ?>">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm flex items-center gap-1">
                <i class="fas fa-file-pdf"></i> Cetak PDF
            </button>
        </form>

        <!-- Tombol Tambah -->
        <div class="flex justify-between items-center mb-4">
            <a href="<?= base_url('/barangmasuk/create') ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 shadow flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Tambah Barang Masuk</span>
            </a>
        </div>

        <!-- Flash Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
                <div class="flex items-center gap-2 text-green-700">
                    <i class="fas fa-check-circle"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-md shadow-sm">
                <div class="flex items-center gap-2 text-red-700">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Tabel Barang Masuk -->
        <div class="overflow-x-auto bg-white rounded shadow border border-gray-200">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-200 text-left">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">No. Reg</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Kode Barang</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($barangMasuk) > 0): ?>
                        <?php foreach ($barangMasuk as $i => $b): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-4 py-2"><?= $i + 1 ?></td>
                                <td class="border px-4 py-2"><?= esc($b['no_reg_barang']) ?></td>
                                <td class="border px-4 py-2"><?= esc($b['tgl_input']) ?></td>
                                <td class="border px-4 py-2"><?= esc($b['kode_barang']) ?></td>
                                <td class="border px-4 py-2"><?= esc($b['nama_barang']) ?></td>
                                <td class="border px-4 py-2"><?= esc($b['jumlah']) ?></td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="<?= base_url('/barangmasuk/edit/' . $b['id']) ?>" class="text-green-500 hover:text-green-700" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('/barangmasuk/delete/' . $b['id']) ?>" class="text-red-500 hover:text-red-700" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-box text-3xl text-gray-300 mb-2"></i>
                                    <p>Belum ada data barang masuk.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
