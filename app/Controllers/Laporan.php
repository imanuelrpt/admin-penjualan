<?php

namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\BarangMasukModel;

class Laporan extends BaseController
{
    protected $penjualanModel;
    protected $barangMasukModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
        $this->barangMasukModel = new BarangMasukModel();
    }

    public function index()
    {
        return view('laporan/index');
    }

    public function penjualan()
    {
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_sampai = $this->request->getPost('tanggal_sampai');

        $query = $this->penjualanModel
            ->select('penjualan.*, konsumen.nama')
            ->join('konsumen', 'konsumen.id = penjualan.id_konsumen');

        if ($tanggal_mulai && $tanggal_sampai) {
            $query->where('tgl_transaksi >=', $tanggal_mulai)
                  ->where('tgl_transaksi <=', $tanggal_sampai);
        }

        $data['penjualan'] = $query->orderBy('tgl_transaksi', 'DESC')->findAll();
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_sampai'] = $tanggal_sampai;

        return view('laporan/penjualan', $data);
    }

    public function barangMasuk()
    {
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_sampai = $this->request->getPost('tanggal_sampai');

        $query = $this->barangMasukModel
            ->select('barang_masuk.*, barang.nama_barang, barang.kode_barang')
            ->join('barang', 'barang.id = barang_masuk.id_barang');

        if ($tanggal_mulai && $tanggal_sampai) {
            $query->where('tgl_input >=', $tanggal_mulai)
                  ->where('tgl_input <=', $tanggal_sampai);
        }

        $data['barangMasuk'] = $query->orderBy('tgl_input', 'DESC')->findAll();
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_sampai'] = $tanggal_sampai;

        return view('laporan/barang_masuk', $data);
    }

    public function perBarang()
{
    $db = \Config\Database::connect();
    $query = $db->query("
        SELECT b.kode_barang, b.nama_barang, 
               SUM(d.jumlah) AS total_terjual, 
               SUM(d.subtotal) AS total_omzet
        FROM penjualan_detail d
        JOIN barang b ON b.id = d.id_barang
        GROUP BY d.id_barang
        ORDER BY total_terjual DESC
    ");

    $data['perBarang'] = $query->getResultArray();
    return view('laporan/per_barang', $data);
}

public function perKonsumen()
{
    $db = \Config\Database::connect();
    $query = $db->query("
        SELECT k.kode_konsumen, k.nama, 
               COUNT(p.id) AS total_transaksi,
               SUM(p.total) AS total_belanja
        FROM penjualan p
        JOIN konsumen k ON k.id = p.id_konsumen
        GROUP BY p.id_konsumen
        ORDER BY total_belanja DESC
    ");

    $data['perKonsumen'] = $query->getResultArray();
    return view('laporan/per_konsumen', $data);
}

}
