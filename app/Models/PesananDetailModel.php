<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananDetailModel extends Model
{
    protected $table = 'tb_pesanan_detail';
    protected $primaryKey = 'id_pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pesanan', 'no_pesanan', 'id_produk', 'jumlah_sewa', 'tgl_mulai_sewa', 'tgl_berakhir_sewa', 'lama_sewa', 'harga_sewa_per_hari', 'total_biaya_sewa'];


    public function search($keyword)
    {
        return $this->table('tb_pesanan')->like('nama_produk', $keyword);
    }
    public function get_pesanan_detail_by_id_user($id_user)
    {
        $keranjang = $this->db->table('tb_pesanan_detail')
            ->join('tb_pesanan', 'tb_pesanan_detail.no_pesanan=tb_pesanan.no_pesanan')
            ->join('tb_produk', 'tb_pesanan_detail.id_produk=tb_produk.id_produk')
            ->where(['tb_pesanan.id_user' => $id_user])
            ->get()->getResultArray();
        return  $keranjang;
    }
    public function get_pesanan_toko_detail_by_id_toko($id_toko)
    {
        $query = $this->db->table('tb_pesanan_detail')
            ->join('tb_pesanan', 'tb_pesanan_detail.no_pesanan=tb_pesanan.no_pesanan')
            ->join('tb_toko', 'tb_toko.id_toko=tb_pesanan.id_toko')
            ->join('tb_produk', 'tb_pesanan_detail.id_produk=tb_produk.id_produk')
            ->where(['tb_toko.id_toko' => $id_toko])
            ->get()->getResultArray();
        return  $query;
    }
    public function get_pesanan_detail_print_by_no_pesanan($no_pesanan)
    {
        $pesanan_detail =  $this
            ->join('tb_produk', 'tb_produk.id_produk=tb_pesanan_detail.id_produk')
            ->where('no_pesanan', $no_pesanan)
            ->get()->getResultArray();
        return $pesanan_detail;
    }
}
