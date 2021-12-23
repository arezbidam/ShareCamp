<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'tb_keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_keranjang', 'id_user', 'id_toko', 'id_produk', 'jumlah_sewa', 'tgl_mulai_sewa', 'tgl_berakhir_sewa'];


    public function search($keyword)
    {
        return $this->table('tb_keranjang')->like('nama_produk', $keyword);
    }
    public function get_keranjang_by_id_user($id_user)
    {
        $keranjang = $this->db->table('tb_keranjang')
            ->where(['tb_keranjang.id_user' => $id_user])
            ->join('tb_toko', 'tb_keranjang.id_toko=tb_toko.id_toko')
            ->join('tb_user', 'tb_keranjang.id_user=tb_user.id_user')
            ->join('tb_barang', 'tb_keranjang.id_produk=tb_barang.id_produk')
            ->get()->getResultArray();
        return  $keranjang;
    }
}
