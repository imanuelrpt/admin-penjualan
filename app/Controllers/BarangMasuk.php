<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use Dompdf\Dompdf;

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

        public function edit($id)
        {
            $data = [
                'barangMasuk' => $this->barangMasukModel->find($id),
                'barangList' => (new \App\Models\BarangModel())->findAll()
            ];
            return view('barang_masuk/edit', $data);
        }

        public function update($id)
        {
            $data = [
                'no_reg_barang' => $this->request->getPost('no_reg_barang'),
                'tgl_input'     => $this->request->getPost('tgl_input'),
                'id_barang'     => $this->request->getPost('id_barang'),
                'jumlah'        => $this->request->getPost('jumlah'),
            ];
            $this->barangMasukModel->update($id, $data);
            return redirect()->to('/barangmasuk')->with('success', 'Data berhasil diperbarui.');
        }

        public function delete($id)
        {
            $this->barangMasukModel->delete($id);
            return redirect()->to('/barangmasuk')->with('success', 'Data berhasil dihapus.');
        }

        public function cetak()
{
    $tanggalAwal  = $this->request->getGet('tanggal_awal');
    $tanggalAkhir = $this->request->getGet('tanggal_akhir');

    $query = $this->barangMasukModel
        ->select('barang_masuk.*, barang.kode_barang, barang.nama_barang')
        ->join('barang', 'barang.id = barang_masuk.id_barang');

    if ($tanggalAwal && $tanggalAkhir) {
        $query->where('tgl_input >=', $tanggalAwal)
              ->where('tgl_input <=', $tanggalAkhir);
    }

    $data['barangMasuk'] = $query->orderBy('tgl_input', 'asc')->findAll();
    $data['tanggalAwal'] = $tanggalAwal;
    $data['tanggalAkhir'] = $tanggalAkhir;

    $html = view('laporan/barang_masuk_pdf', $data);

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('laporan-barang-masuk.pdf', ['Attachment' => false]);
}


}
