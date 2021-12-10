<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'tb_keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_keranjang', 'id_user', 'id_toko', 'id_barang'];

    public function get_keranjang_by_id_user($id_user)
    {
        $keranjang = $this->db->table('tb_keranjang')
            ->where(['tb_keranjang.id_user' => $id_user])
            ->join('tb_toko', 'tb_keranjang.id_toko=tb_toko.id_toko')
            ->join('tb_user', 'tb_keranjang.id_user=tb_user.id_user')
            ->join('tb_barang', 'tb_keranjang.id_barang=tb_barang.id_barang')
            ->get()->getResultArray();
        return  $keranjang;
    }

    public function get_keranjang_by_city($city)
    {
        # code...
        $join = $this->db->table('tb_barang')
            ->join('tb_toko', 'tb_barang.id_toko=tb_toko.id_toko')
            ->where('kota_toko', $city)
            ->get()->getResultArray();

        return $join;
    }

    public function get_keranjang_by_filter_asc()
    {
        return $this->orderBy('harga', 'ASC')->get()->getResultArray();
    }
}
