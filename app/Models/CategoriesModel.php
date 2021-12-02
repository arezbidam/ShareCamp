<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'tb_categories';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_categories', 'keterangan_categories'];

    public function getCategories($nama_categories = false)
    {

        if ($nama_categories == false) {
            return $this->findAll();
        }
        return $this->where(['nama_categories' => $nama_categories])->first();
    }
}
