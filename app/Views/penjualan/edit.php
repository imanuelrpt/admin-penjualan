<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .item-row .remove-btn {
            margin-top: 28px;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4 text-gray-700">Edit Transaksi Penjualan</h2>

    <form action="<?= base_url('/penjualan/update/' . $penjualan['id']) ?>" method="post">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm">No Faktur</label>
                <input type="text" name="no_faktur" value="<?= esc($penjualan['no_faktur']) ?>" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-sm">Tanggal</label>
                <input type="date" name="tgl_transaksi" value="<?= esc($penjualan['tgl_transaksi']) ?>" required class="w-full border p-2 rounded">
            </div>
            <div class="col-span-2">
                <label class="block text-sm">Konsumen</label>
                <select name="id_konsumen" required class="w-full border p-2 rounded">
                    <?php foreach ($konsumen as $k): ?>
                        <option value="<?= $k['id'] ?>" <?= $k['id'] == $penjualan['id_konsumen'] ? 'selected' : '' ?>>
                            <?= $k['kode_konsumen'] ?> - <?= $k['nama'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <hr class="my-4">

        <div id="items" class="space-y-4">
            <?php foreach ($detail as $i => $d): ?>
                <div class="grid grid-cols-6 gap-2 item-row">
                    <div class="col-span-2">
                        <label class="text-sm">Barang</label>
                        <select name="barang[]" required class="w-full border p-2 rounded">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($barang as $b): ?>
                                <option value="<?= $b['id'] ?>" <?= $b['id'] == $d['id_barang'] ? 'selected' : '' ?>>
                                    <?= $b['kode_barang'] ?> - <?= $b['nama_barang'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm">Harga</label>
                        <input type="number" name="harga[]" value="<?= esc($d['harga']) ?>" oninput="updateHarga()" class="w-full border p-2 rounded" step="100">
                    </div>
                    <div>
                        <label class="text-sm">Jumlah</label>
                        <input type="number" name="jumlah[]" value="<?= esc($d['jumlah']) ?>" oninput="updateHarga()" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="text-sm">Subtotal</label>
                        <input type="number" name="subtotal[]" value="<?= esc($d['subtotal']) ?>" readonly class="w-full border p-2 rounded bg-gray-100">
                    </div>
                    <div class="flex items-end">
                        <button type="button" onclick="hapusItem(this)" class="remove-btn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                            Hapus
                        </button>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <!-- Template item baru -->
        <div class="grid grid-cols-6 gap-2 item-row-template hidden mt-2">
            <div class="col-span-2">
                <label class="text-sm">Barang</label>
                <select name="barang[]" class="w-full border p-2 rounded">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($barang as $b): ?>
                        <option value="<?= $b['id'] ?>"><?= $b['kode_barang'] ?> - <?= $b['nama_barang'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="text-sm">Harga</label>
                <input type="number" name="harga[]" oninput="updateHarga()" class="w-full border p-2 rounded" step="100">
            </div>
            <div>
                <label class="text-sm">Jumlah</label>
                <input type="number" name="jumlah[]" oninput="updateHarga()" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="text-sm">Subtotal</label>
                <input type="number" name="subtotal[]" readonly class="w-full border p-2 rounded bg-gray-100">
            </div>
            <div class="flex items-end">
                <button type="button" onclick="hapusItem(this)" class="remove-btn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                    Hapus
                </button>
            </div>
        </div>

        <div class="mt-4">
            <button type="button" onclick="tambahItem()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                + Tambah Item
            </button>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-semibold">Grand Total</label>
            <input type="number" id="grand_total" name="grand_total" value="<?= esc($penjualan['total']) ?>" class="w-full border p-2 rounded bg-gray-100" readonly>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function updateHarga() {
        const rows = document.querySelectorAll('.item-row');
        let total = 0;
        rows.forEach(row => {
            const harga = parseFloat(row.querySelector('[name="harga[]"]').value) || 0;
            const jumlah = parseInt(row.querySelector('[name="jumlah[]"]').value) || 0;
            const subtotal = harga * jumlah;
            row.querySelector('[name="subtotal[]"]').value = subtotal;
            total += subtotal;
        });
        document.querySelector('#grand_total').value = total;
    }

    function tambahItem() {
        const template = document.querySelector('.item-row-template');
        const clone = template.cloneNode(true);
        clone.classList.remove('hidden', 'item-row-template');
        clone.classList.add('item-row');
        clone.querySelectorAll('input').forEach(input => input.value = '');
        document.getElementById('items').appendChild(clone);
        updateHarga();
    }

    function hapusItem(button) {
        const row = button.closest('.item-row');
        if (row) {
            row.remove();
            updateHarga();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateHarga();
    });
</script>

</body>
</html>
