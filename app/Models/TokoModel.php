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
    public function get_all_toko()
    {
        return $this->findAll();
    }
    public function delete_produk($id_toko)
    {
        return $this->table("tb_produk")->where('id_toko', $id_toko)->delete();
    }
    public function get_toko_by_id_toko($id_toko)
    {
        return $this->where(['id_toko' => $id_toko])->first();
    }
    public function get_pemilik_toko($id_toko)
    {
        return $this
            ->join('tb_user', 'tb_user.id_user=tb_toko.id_user')
            ->where(['id_toko' => $id_toko])->get()->getRow();
    }
}
