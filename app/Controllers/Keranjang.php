<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;
use App\Models\KeranjangModel;

class Keranjang extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();
        $this->BarangModel = new BarangModel();
        $this->KeranjangModel = new KeranjangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'isi' => $this->UserModel->findAll(),
            'keranjang' => $this->KeranjangModel->get_keranjang_by_id_user(session()->get('id')),
        ];
        return view('pages/keranjang', $data);
    }
}
