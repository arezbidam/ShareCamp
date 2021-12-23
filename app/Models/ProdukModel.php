<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_produk', 'nama_produk', 'img_path', 'kategori_produk', 'deskripsi', 'stok', 'harga', 'status', 'id_toko'];


    public function search($keyword)
    {
        return $this->table('tb_produk')->like('nama_produk', $keyword);
    }
    public function get_produk_by_id_toko($id_toko)
    {
        return $this->where(['id_toko' => $id_toko])->findAll();
    }

    public function get_produk_by_id_produk($id_produk)
    {
        return $this->where(['id_produk' => $id_produk])->first();
    }

    public function get_produk_by_city($city)
    {
        $join = $this->db->table('tb_produk')
            ->join('tb_toko', 'tb_produk.id_toko=tb_toko.id_toko')
            ->where('kota_toko', $city)
            ->get()->getResultArray();
        return $join;
    }
    public function get_produk_by_filter_asc()
    {
        return $this->orderBy('harga', 'ASC')->get()->getResultArray();
    }
    public function delete_produk_where($where)
    {
        $this->where($where);
        return $this->delete();
    }
}
