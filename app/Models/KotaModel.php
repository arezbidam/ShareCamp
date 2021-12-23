<?php

namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table = 'tb_kota';
    protected $primaryKey = 'id_kota';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kota', 'nama_kota'];
}
