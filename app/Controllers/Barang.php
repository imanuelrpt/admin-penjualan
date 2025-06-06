<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barang/index', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function save()
    {
        $this->barangModel->save([
            'kode_barang'  => $this->request->getPost('kode_barang'),
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'harga'        => $this->request->getPost('harga'),
            'stok'         => $this->request->getPost('stok'),
        ]);

        return redirect()->to('/barang')->with('success', 'Data barang berhasil disimpan.');
    }

    public function edit($id)
    {
        $barang = $this->barangModel->find($id);
        if (!$barang) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }

        return view('barang/edit', ['barang' => $barang]);
    }

    public function update($id)
    {
        $this->barangModel->update($id, [
            'kode_barang'  => $this->request->getPost('kode_barang'),
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'satuan'       => $this->request->getPost('satuan'),
            'stok'         => $this->request->getPost('stok'),
        ]);

        return redirect()->to('/barang')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang')->with('success', 'Data barang berhasil dihapus.');
    }

    public function detail($id)
    {
        $barang = $this->barangModel->find($id);
        if (!$barang) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }

        return view('barang/detail', ['barang' => $barang]);
    }

}
