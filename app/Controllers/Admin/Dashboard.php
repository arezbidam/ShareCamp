<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();
        $this->ProdukModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'isi' => $this->UserModel->findAll(),
            'categories' => $this->KategoriModel->findAll(),
            'barang' => $this->ProdukModel->findAll(),
            // 'barang_detail' => $this->BarangModel->get_barang_detail(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/dashboard', $data);
    }
}
