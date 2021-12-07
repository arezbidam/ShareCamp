<?php

namespace App\Models;
use App\Models\UserModel;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'tb_toko';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_toko', 'nama_toko', 'alamat_toko', 'no_telp_toko', 'deskripsi_toko', 'status_toko', 'id_user'];

    public function get_toko()
    {
        return $this->where('id_user',session()->get('id'))->first();
    }
}
