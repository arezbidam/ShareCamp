<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'nama_barang', 'foto_barang_path', 'kategori_barang', 'deskripsi', 'stok', 'harga', 'status', 'id_toko'];

    public function get_barang($id_toko)
    {
        return $this->where(['id_toko' => $id_toko])->findAll();
    }

    public function get_barang_by_id_barang($id_barang)
    {
        return $this->where(['id_barang' => $id_barang])->first();
    }

    public function get_barang_by_city($city)
    {
        # code...
        $join = $this->db->table('tb_barang')
        ->join('tb_toko', 'tb_barang.id_toko=tb_toko.id_toko')
        ->where('kota_toko', $city)
        ->get()->getResultArray();
        return $join;
    }

    public function get_barang_by_filter_asc()
    {
        return $this->orderBy('harga', 'ASC')->get()->getResultArray();
    }
}
