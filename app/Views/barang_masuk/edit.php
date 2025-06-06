<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Edit Barang Masuk</h2>

        <form action="<?= base_url('/barangmasuk/update/' . $barangMasuk['id']) ?>" method="post" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">No. Reg Barang</label>
                <input type="text" name="no_reg_barang" value="<?= esc($barangMasuk['no_reg_barang']) ?>" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Tanggal Input</label>
                <input type="date" name="tgl_input" value="<?= esc($barangMasuk['tgl_input']) ?>" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Barang</label>
                <select name="id_barang" required class="w-full border p-2 rounded">
                    <option value="">-- Pilih Barang --</option>
                    <?php foreach ($barangList as $b): ?>
                        <option value="<?= $b['id'] ?>" <?= $b['id'] == $barangMasuk['id_barang'] ? 'selected' : '' ?>>
                            <?= $b['kode_barang'] ?> - <?= $b['nama_barang'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Jumlah</label>
                <input type="number" name="jumlah" value="<?= esc($barangMasuk['jumlah']) ?>" required class="w-full border p-2 rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="<?= base_url('/barangmasuk') ?>" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 text-sm">Batal</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
