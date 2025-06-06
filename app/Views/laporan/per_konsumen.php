<!-- app/Views/laporan/per_konsumen.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Per Konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Laporan Penjualan Per Konsumen</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Kode Konsumen</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Total Transaksi</th>
                        <th class="px-4 py-2 border">Total Belanja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perKonsumen as $i => $k): ?>
                        <tr>
                            <td class="border px-4 py-2"><?= $i + 1 ?></td>
                            <td class="border px-4 py-2"><?= esc($k['kode_konsumen']) ?></td>
                            <td class="border px-4 py-2"><?= esc($k['nama']) ?></td>
                            <td class="border px-4 py-2"><?= $k['total_transaksi'] ?></td>
                            <td class="border px-4 py-2">Rp<?= number_format($k['total_belanja'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
