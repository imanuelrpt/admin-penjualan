<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-700">Detail Transaksi</h2>
            <a href="<?= base_url('/penjualan') ?>" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

        <div class="mb-4">
            <p><strong>No Faktur:</strong> <?= esc($penjualan['no_faktur']) ?></p>
            <p><strong>Tanggal:</strong> <?= esc($penjualan['tgl_transaksi']) ?></p>
            <p><strong>Konsumen:</strong> <?= esc($penjualan['nama']) ?></p>
        </div>

        <table class="min-w-full border bg-white mb-4">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Kode Barang</th>
                    <th class="px-4 py-2 border">Nama Barang</th>
                    <th class="px-4 py-2 border">Harga</th>
                    <th class="px-4 py-2 border">Jumlah</th>
                    <th class="px-4 py-2 border">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail as $i => $d): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $i + 1 ?></td>
                        <td class="border px-4 py-2"><?= esc($d['kode_barang']) ?></td>
                        <td class="border px-4 py-2"><?= esc($d['nama_barang']) ?></td>
                        <td class="border px-4 py-2">Rp<?= number_format($d['harga'], 0, ',', '.') ?></td>
                        <td class="border px-4 py-2"><?= $d['jumlah'] ?></td>
                        <td class="border px-4 py-2">Rp<?= number_format($d['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="text-right font-bold text-lg text-blue-700">
            Total: Rp<?= number_format($penjualan['total'], 0, ',', '.') ?>
        </div>
    </div>

</body>
</html>
