<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // ...
    protected $table      = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['email', 'password', 'nama', 'no_ktp', 'alamat', 'kota', 'no_tlp', 'no_rek', 'id_bank', 'atas_nama_bank' ]; 
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}
