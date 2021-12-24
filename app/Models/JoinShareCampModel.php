<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinShareCampModel extends Model
{
    protected $table = 'tb_join_sharecamp';
    protected $primaryKey = 'id_join_sharecamp';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_join_sharecamp', 'no_sharecamp', 'id_user'];
}
