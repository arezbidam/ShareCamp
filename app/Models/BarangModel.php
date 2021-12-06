<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'nama_barang', 'foto_barang_path', 'deskripsi', 'stok', 'harga', 'status', 'id_toko'];

    public function get_barang($id_toko)
    {
        return $this->where(['id_toko' => $id_toko])->findAll();
    }
    public function get_barang_by_id_barang($id_barang)
    {
        return $this->where(['id_barang' => $id_barang])->first();
    }
}
