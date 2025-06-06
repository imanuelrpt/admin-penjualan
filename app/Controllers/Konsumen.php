<?php

namespace App\Controllers;

use App\Models\KonsumenModel;

class Konsumen extends BaseController
{
    protected $konsumenModel;

    public function __construct()
    {
        $this->konsumenModel = new KonsumenModel();
    }

    public function index()
    {
        $data['konsumen'] = $this->konsumenModel->findAll();
        return view('konsumen/index', $data);
    }


    public function create()
    {
        return view('konsumen/create');
    }

    public function save()
    {
        $this->konsumenModel->save([
            'kode_konsumen' => $this->request->getPost('kode_konsumen'),
            'nama'          => $this->request->getPost('nama'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp')
        ]);

        return redirect()->to('/konsumen')->with('success', 'Data konsumen berhasil ditambahkan.');
    }

    public function detail($id)
    {
        $konsumen = $this->konsumenModel->find($id);

        if (!$konsumen) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data konsumen tidak ditemukan');
        }

        return view('konsumen/detail', ['konsumen' => $konsumen]);
    }

    public function edit($id)
{
    $konsumen = $this->konsumenModel->find($id);
    if (!$konsumen) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
    }

    return view('konsumen/edit', ['konsumen' => $konsumen]);
}

public function update($id)
{
    $this->konsumenModel->update($id, [
        'kode_konsumen' => $this->request->getPost('kode_konsumen'),
        'nama'          => $this->request->getPost('nama'),
        'alamat'        => $this->request->getPost('alamat'),
        'no_hp'         => $this->request->getPost('no_hp')
    ]);

    return redirect()->to('/konsumen')->with('success', 'Data konsumen berhasil diperbarui.');
}

public function delete($id)
{
    $penjualan = (new \App\Models\PenjualanModel())
        ->where('id_konsumen', $id)
        ->countAllResults();

    if ($penjualan > 0) {
        return redirect()->to('/konsumen')->with('error', 'Gagal hapus. Konsumen masih digunakan dalam transaksi penjualan.');
    }

    $this->konsumenModel->delete($id);
    return redirect()->to('/konsumen')->with('success', 'Data konsumen berhasil dihapus.');
}


}
