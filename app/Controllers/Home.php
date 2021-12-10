<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'isi' => $this->UserModel->findAll(),
            'categories' => $this->CategoriesModel->findAll(),
            'barang' => $this->BarangModel->findAll(),
            // 'barang_detail' => $this->BarangModel->get_barang_detail(),
        ];
        // dd($data['get_barang_detail']);
        return view('home', $data);
    }
}
