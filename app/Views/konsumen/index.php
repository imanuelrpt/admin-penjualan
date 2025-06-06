<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-10">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-users text-blue-500"></i>
                <h1 class="text-lg font-bold text-gray-800">Daftar Konsumen</h1>
            </div>
            <a href="<?= base_url('/dashboard') ?>" class="flex items-center space-x-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-md transition duration-200">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6">

        <!-- Header & Add Button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Manajemen Data Konsumen</h2>
                <p class="text-sm text-gray-500">Daftar lengkap konsumen yang terdaftar dalam sistem</p>
            </div>
            <a href="<?= base_url('/konsumen/create') ?>" class="flex items-center space-x-2 bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md transition duration-200">
                <i class="fas fa-plus"></i>
                <span>Tambah Konsumen</span>
            </a>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4 rounded-md shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <p class="text-green-700"><?= session()->getFlashdata('success') ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4 rounded-md shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                    <p class="text-red-700"><?= session()->getFlashdata('error') ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Table -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Konsumen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. Telp</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (count($konsumen) > 0): ?>
                            <?php foreach ($konsumen as $i => $k): ?>
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= $i + 1 ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= esc($k['kode_konsumen']) ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900"><?= esc($k['nama']) ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate"><?= esc($k['alamat']) ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= esc($k['no_hp']) ?></td>
                                    <td class="px-6 py-4 text-center text-sm font-medium">
                                        <div class="flex justify-center space-x-3">
                                            <a href="<?= base_url('/konsumen/' . $k['id']) ?>" class="text-blue-500 hover:text-blue-700" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('/konsumen/edit/' . $k['id']) ?>" class="text-green-500 hover:text-green-700" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('/konsumen/delete/' . $k['id']) ?>" class="text-red-500 hover:text-red-700" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-sm text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-user-slash text-gray-400 text-3xl mb-2"></i>
                                        <p>Belum ada data konsumen</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
