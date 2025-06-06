<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanDetailModel extends Model
{
    protected $table = 'penjualan_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_penjualan', 'id_barang', 'harga', 'jumlah', 'subtotal'];
    public $timestamps = false;
}
