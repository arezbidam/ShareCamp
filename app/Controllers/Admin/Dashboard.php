<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();
        $this->ProdukModel = new ProdukModel();
        $this->TokoModel = new TokoModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'isi' => $this->UserModel->findAll(),
            'produk' => $this->ProdukModel->findAll(),
            'total_toko' => $this->TokoModel->countAll(),
            'total_produk' => $this->ProdukModel->countAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/dashboard', $data);
    }
}
