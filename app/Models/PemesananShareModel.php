<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananShareModel extends Model
{
  protected $table = 'tb_pemesanan_share';
  protected $primaryKey = 'id_share';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_share ', 'id_user_1', 'id_user_2', 'id_barang', 'id_toko',];

  public function get_data_barang($id_barang)
  {
    # code...
    $pemesanan_share = $this->db->table('tb_pemesanan_share')
    ->where(['tb_pemesanan_share.id_barang' => $id_barang])
      // ->join('tb_toko', 'tb_pemesanan_share.id_toko=tb_toko.id_toko')
      // ->join('tb_user', 'tb_pemesanan_share.id_user=tb_user.id_user')
      ->join('tb_barang', 'tb_pemesanan_share.id_barang=tb_barang.id_barang')
      ->get()->getResultArray();
    return  $pemesanan_share;
  }
}
