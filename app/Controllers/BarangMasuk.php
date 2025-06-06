<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;

class BarangMasuk extends BaseController
{
    protected $barangMasukModel;
    protected $barangModel;

    public function __construct()
    {
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data['barangMasuk'] = $this->barangMasukModel
            ->select('barang_masuk.*, barang.nama_barang, barang.kode_barang')
            ->join('barang', 'barang.id = barang_masuk.id_barang')
            ->orderBy('barang_masuk.tgl_input', 'DESC')
            ->findAll();

        return view('barang_masuk/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barang_masuk/create', $data);
    }

    public function save()
    {
        $this->barangMasukModel->save([
            'no_reg_barang' => $this->request->getPost('no_reg_barang'),
            'tgl_input'     => $this->request->getPost('tgl_input'),
            'id_barang'     => $this->request->getPost('id_barang'),
            'jumlah'        => $this->request->getPost('jumlah')
        ]);

        return redirect()->to('/barangmasuk')->with('success', 'Barang masuk berhasil disimpan.');
    }
}
