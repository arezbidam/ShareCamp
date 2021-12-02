<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CategoriesModel;
use App\Models\TokoModel;

class Toko extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();;
        $this->TokoModel = new TokoModel();;
    }

    public function toko_saya($id_user)
    {
        $toko_saya = $this->TokoModel->get_toko($id_user);
        $data = [
            'title' => 'Toko Saya',
            'categories' => $this->CategoriesModel->findAll(),
            'toko' => $toko_saya,
        ];
        return view('toko/toko_saya', $data);
    }
    public function buat_toko_baru_dengan_id_user($id_user)
    {
        $toko_saya = $this->TokoModel->get_toko($id_user);
        if ($toko_saya) {
            session()->setFlashdata('pesan', '
            <div class="alert alert-danger" role="alert">
            Anda Sudah Mempunyai Toko.
            </div>
            ');
        } else {
            $data = [
                'title' => 'Toko Saya',
                'id_user' => $id_user,
            ];
            return view('toko/buat_toko_baru', $data);
        }
    }
}
