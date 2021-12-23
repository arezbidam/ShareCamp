<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'tb_pesanan';
    protected $primaryKey = 'no_pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_pesanan', 'tgl_pesanan', 'id_toko', 'id_user', 'total_biaya_pesanan', 'sudah_bayar', 'sisa_bayar'];


    public function get_pesanan_print_by_no_pesanan($no_pesanan)
    {
        $pesanan =  $this
            ->join('tb_toko', 'tb_toko.id_toko=tb_pesanan.id_toko')
            ->join('tb_user', 'tb_user.id_user=tb_pesanan.id_user')
            ->where('no_pesanan', $no_pesanan)
            ->get()->getRow();
        return $pesanan;
    }
}
