<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
  protected $table = 'tb_pemesanan';
  protected $primaryKey = 'id_pemesanan';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pemesanan ', 'id_barang', 'id_toko', 'id_user'];

  public function get_pemesanan_by_id_user($id_user)
  {
    $pemesanan = $this->db->table('tb_pemesanan')
    ->where(['tb_pemesanan.id_user' => $id_user])
      // ->join('tb_toko', 'tb_pemesanan.id_toko=tb_toko.id_toko')
      ->join('tb_user', 'tb_pemesanan.id_user=tb_user.id_user')
      ->join('tb_barang', 'tb_pemesanan.id_barang=tb_barang.id_barang')
      ->get()->getResultArray();
    return  $pemesanan;
  }

  public function get_pemesanan_detail($id)
  {
    # code...
    $pemesanan_detail = $this->db->table('tb_pemesanan')
    ->where(['tb_pemesanan.id_pemesanan' => $id])
      // ->join('tb_toko', 'tb_pemesanan.id_toko=tb_toko.id_toko')
      ->join('tb_user', 'tb_pemesanan.id_user=tb_user.id_user')
      ->join('tb_barang', 'tb_pemesanan.id_barang=tb_barang.id_barang')
      ->get()->getResultArray();

    return  $pemesanan_detail;
  }


  // public function get_pemesanan($id)
  // {
  //   # code...
  //   $pemesanan = $this->where(['id_user' => $id])->first();
  //   // $pemesanan = 'ok';
  //   // $pemesanan = $this->db->table('tb_pemesanan')
  //   // ->where('tb_pemesanan.id_user', $id_user)
  //   //   ->join('tb_toko', 'tb_pemesanan.id_toko=tb_toko.id_toko')
  //   // ->join('tb_user', 'tb_pemesanan.id_user=tb_user.id_user')
  //   // ->join('tb_barang', 'tb_pemesanan.id_barang=tb_barang.id_barang')
  //   // ->get()->getResultArray();
  //   return  $pemesanan;
  // }

}
