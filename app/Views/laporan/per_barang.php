<!-- app/Views/laporan/per_barang.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Per Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Laporan Penjualan Per Barang</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Kode</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Total Terjual</th>
                        <th class="px-4 py-2 border">Total Omzet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perBarang as $i => $b): ?>
                        <tr>
                            <td class="border px-4 py-2"><?= $i + 1 ?></td>
                            <td class="border px-4 py-2"><?= esc($b['kode_barang']) ?></td>
                            <td class="border px-4 py-2"><?= esc($b['nama_barang']) ?></td>
                            <td class="border px-4 py-2"><?= $b['total_terjual'] ?></td>
                            <td class="border px-4 py-2">Rp<?= number_format($b['total_omzet'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
