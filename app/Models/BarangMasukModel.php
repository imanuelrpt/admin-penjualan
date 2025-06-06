<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['no_reg_barang', 'tgl_input', 'id_barang', 'jumlah'];
    protected $useTimestamps = true;
}
