<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kategori', 'nama_kategori', 'keterangan_kategori'];

    public function getKategoriByName($nama_kategori = false)
    {

        if ($nama_kategori == false) {
            return $this->findAll();
        }
        return $this->where(['nama_kategori' => $nama_kategori])->first();
    }
    public function getKategoriById($id_kategori = false)
    {
        if ($id_kategori == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id_kategori])->first();
    }
}
