<?php

namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use App\Models\BarangModel;
use App\Models\KonsumenModel;

class Penjualan extends BaseController
{
    protected $penjualanModel;
    protected $penjualanDetailModel;
    protected $barangModel;
    protected $konsumenModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
        $this->penjualanDetailModel = new PenjualanDetailModel();
        $this->barangModel = new BarangModel();
        $this->konsumenModel = new KonsumenModel();
    }

    public function index()
    {
        $data['penjualan'] = $this->penjualanModel
            ->select('penjualan.*, konsumen.nama')
            ->join('konsumen', 'konsumen.id = penjualan.id_konsumen')
            ->orderBy('penjualan.tgl_transaksi', 'DESC')
            ->findAll();

        return view('penjualan/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        $data['konsumen'] = $this->konsumenModel->findAll();
        return view('penjualan/create', $data);
    }

    public function save()
    {
        // 1. Simpan transaksi utama
        $this->penjualanModel->save([
            'no_faktur'     => $this->request->getPost('no_faktur'),
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            'id_konsumen'   => $this->request->getPost('id_konsumen'),
            'total'         => $this->request->getPost('grand_total')
        ]);

        $id_penjualan = $this->penjualanModel->getInsertID();

        // 2. Simpan detail barang
        $barang = $this->request->getPost('barang');
        $jumlah = $this->request->getPost('jumlah');
        $harga = $this->request->getPost('harga');
        $subtotal = $this->request->getPost('subtotal');

        foreach ($barang as $i => $id_barang) {
            $this->penjualanDetailModel->insert([
                'id_penjualan' => $id_penjualan,
                'id_barang'    => $id_barang,
                'harga'        => $harga[$i],
                'jumlah'       => $jumlah[$i],
                'subtotal'     => $subtotal[$i]
            ]);
        }

        return redirect()->to('/penjualan')->with('success', 'Transaksi penjualan berhasil disimpan.');
    }

    public function detail($id)
    {
        $penjualan = $this->penjualanModel
            ->select('penjualan.*, konsumen.nama')
            ->join('konsumen', 'konsumen.id = penjualan.id_konsumen')
            ->find($id);

        if (!$penjualan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        }

        $detail = $this->penjualanDetailModel
            ->select('penjualan_detail.*, barang.nama_barang, barang.kode_barang')
            ->join('barang', 'barang.id = penjualan_detail.id_barang')
            ->where('id_penjualan', $id)
            ->findAll();

        return view('penjualan/detail', [
            'penjualan' => $penjualan,
            'detail'    => $detail
        ]);
    }

    public function edit($id)
    {
        $penjualan = $this->penjualanModel->find($id);

        if (!$penjualan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        }

        $detail = $this->penjualanDetailModel
            ->where('id_penjualan', $id)
            ->findAll();

        $barang = (new \App\Models\BarangModel())->findAll();
        $konsumen = (new \App\Models\KonsumenModel())->findAll();

        return view('penjualan/edit', [
            'penjualan' => $penjualan,
            'detail'    => $detail,
            'barang'    => $barang,
            'konsumen'  => $konsumen
        ]);
    }


    public function delete($id)
    {
        // Hapus semua detail dulu
        $this->penjualanDetailModel->where('id_penjualan', $id)->delete();

        // Lalu hapus transaksi utama
        $this->penjualanModel->delete($id);

        return redirect()->to('/penjualan')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function update($id)
    {
        // Validasi data penjualan utama
        $data = [
            'no_faktur'     => $this->request->getPost('no_faktur'),
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            'id_konsumen'   => $this->request->getPost('id_konsumen'),
            'total'         => $this->request->getPost('grand_total')
        ];

        // Update penjualan utama
        $this->penjualanModel->update($id, $data);

        // Hapus semua detail sebelumnya
        $this->penjualanDetailModel->where('id_penjualan', $id)->delete();

        // Simpan detail baru dari form
        $barang = $this->request->getPost('barang');
        $harga = $this->request->getPost('harga');
        $jumlah = $this->request->getPost('jumlah');
        $subtotal = $this->request->getPost('subtotal');

        foreach ($barang as $i => $id_barang) {
        if (!$id_barang) continue; // lewati jika tidak dipilih

        $this->penjualanDetailModel->insert([
            'id_penjualan' => $id,
            'id_barang'    => $id_barang,
            'harga'        => $harga[$i],
            'jumlah'       => $jumlah[$i],
            'subtotal'     => $subtotal[$i]
        ]);
    }


        return redirect()->to('/penjualan')->with('success', 'Transaksi berhasil diperbarui.');
    }

}
