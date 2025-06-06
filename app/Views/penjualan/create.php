<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penjualan</title>
    <script>
        function tambahItem() {
            const row = document.querySelector('.item-row').cloneNode(true);
            row.querySelectorAll('input').forEach(input => input.value = '');
            document.querySelector('#items').appendChild(row);
            updateHarga();
        }

        function updateHarga() {
            const baris = document.querySelectorAll('.item-row');
            let total = 0;
            baris.forEach(row => {
                const harga = parseFloat(row.querySelector('[name="harga[]"]').value) || 0;
                const jumlah = parseInt(row.querySelector('[name="jumlah[]"]').value) || 0;
                const subtotal = harga * jumlah;
                row.querySelector('[name="subtotal[]"]').value = subtotal;
                total += subtotal;
            });
            document.querySelector('#grand_total').value = total;
        }

        function autoHarga(select) {
            const harga = select.selectedOptions[0].dataset.harga;
            const row = select.closest('.item-row');
            row.querySelector('[name="harga[]"]').value = harga;
            updateHarga();
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="text-lg font-semibold text-blue-600 flex items-center space-x-2">
            <i class="fas fa-cart-plus"></i>
            <span>Tambah Penjualan</span>
        </div>
        <a href="<?= base_url('/penjualan') ?>" class="text-sm text-gray-600 hover:text-blue-600 flex items-center">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </nav>

    <!-- Content -->
    <div class="max-w-5xl mx-auto bg-white p-6 mt-6 rounded shadow">

        <form action="<?= base_url('/penjualan/save') ?>" method="post">
            <!-- Info Penjualan -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">No Faktur</label>
                    <input type="text" name="no_faktur" required class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Tanggal</label>
                    <input type="date" name="tgl_transaksi" required class="w-full border p-2 rounded">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-600">Konsumen</label>
                    <select name="id_konsumen" required class="w-full border p-2 rounded">
                        <option value="">-- Pilih Konsumen --</option>
                        <?php foreach ($konsumen as $k): ?>
                            <option value="<?= $k['id'] ?>"><?= $k['kode_konsumen'] ?> - <?= $k['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <hr class="my-4">

            <!-- Daftar Item -->
            <div id="items" class="space-y-4">
                <div class="grid grid-cols-5 gap-2 item-row">
                    <div class="col-span-2">
                        <label class="text-sm text-gray-700">Barang</label>
                        <select name="barang[]" onchange="autoHarga(this)" required class="w-full border p-2 rounded">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($barang as $b): ?>
                                <option value="<?= $b['id'] ?>">
                                    <?= $b['kode_barang'] ?> - <?= $b['nama_barang'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Harga</label>
                        <input type="number" name="harga[]" class="w-full border p-2 rounded bg-gray-50" readonly>
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Jumlah</label>
                        <input type="number" name="jumlah[]" min="1" oninput="updateHarga()" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Subtotal</label>
                        <input type="number" name="subtotal[]" class="w-full border p-2 rounded bg-gray-50" readonly>
                    </div>
                </div>
            </div>

            <!-- Tombol Tambah Item -->
            <div class="mt-4">
                <button type="button" onclick="tambahItem()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    <i class="fas fa-plus-circle mr-1"></i> Tambah Item
                </button>
            </div>

            <!-- Total -->
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700">Grand Total</label>
                <input type="number" id="grand_total" name="grand_total" class="w-full border p-2 rounded bg-gray-100" readonly>
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 shadow">
                    <i class="fas fa-save mr-1"></i> Simpan Transaksi
                </button>
            </div>
        </form>
    </div>

</body>
</html>
