<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'tb_login';
    protected $primaryKey = 'id_login';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_login', 'email', 'password', 'hak_akses', 'id_user', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function update_password($data)
    {

        $data_login = $this->where('id_user', session()->get('id'))->first();
        return $this->update(['id_login' => $data_login['id_login']], $data);
    }
}
