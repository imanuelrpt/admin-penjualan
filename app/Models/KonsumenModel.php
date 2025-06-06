<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsumenModel extends Model
{
    protected $table = 'konsumen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_konsumen', 'nama', 'alamat', 'no_hp'];
    protected $useTimestamps = false;

}
