<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'tb_toko';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_toko', 'alamat_toko', 'jam_operasional', 'id_user'];

    public function get_toko($id_user = false)
    {
        return $this->where(['id_user' => $id_user])->first();
    }
}
