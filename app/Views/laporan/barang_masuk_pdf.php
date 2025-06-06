<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Masuk</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        h2 {
            text-align: center;
            margin-bottom: 0;
        }
        .tanggal {
            font-size: 11px;
            text-align: right;
            margin-top: 4px;
        }
    </style>
</head>
<body>

    <!-- Judul -->
    <h2>Laporan Barang Masuk</h2>

    <!-- Tanggal Cetak dan Periode -->
    <p class="tanggal">
        Tanggal Cetak: <?= date('d-m-Y') ?><br>
        Periode: <?= date('d-m-Y', strtotime($tanggalAwal)) ?> s/d <?= date('d-m-Y', strtotime($tanggalAkhir)) ?>
    </p>

    <!-- Tabel Laporan -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Reg</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barangMasuk as $i => $b): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($b['no_reg_barang']) ?></td>
                    <td><?= date('d-m-Y', strtotime($b['tgl_input'])) ?></td>
                    <td><?= esc($b['kode_barang']) ?></td>
                    <td><?= esc($b['nama_barang']) ?></td>
                    <td><?= esc($b['jumlah']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>
