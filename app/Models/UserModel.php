<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama', 'no_ktp', 'kota', 'alamat', 'no_telp', 'no_rek', 'nama_bank', 'atas_nama_bank'];
    protected $useTimestamps = true;
}
