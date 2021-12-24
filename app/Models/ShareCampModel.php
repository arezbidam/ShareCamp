<?php

namespace App\Models;

use CodeIgniter\Model;

class ShareCampModel extends Model
{
    protected $table = 'tb_sharecamp';
    protected $primaryKey = 'no_sharecamp';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_sharecamp', 'dari_tgl', 'sampai_tgl', 'tujuan', 'kota', 'keterangan', 'id_user'];
}
