<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['no_faktur', 'tgl_transaksi', 'id_konsumen', 'total'];
}

