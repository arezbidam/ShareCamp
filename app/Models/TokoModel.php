<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'tb_toko';
    protected $primaryKey = 'id_toko';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_toko', 'nama_toko', 'kota_toko', 'alamat_toko', 'no_telp_toko', 'deskripsi_toko', 'status_toko', 'id_user'];

    public function get_toko($id_user)
    {
        return $this->where(['id_user' => $id_user])->first();
    }
    public function get_toko_by_id_toko($id_toko)
    {
        return $this->where(['id_toko' => $id_toko])->first();
    }
}
