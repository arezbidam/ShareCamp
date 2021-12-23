<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;

class Frontend extends BaseController
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
            'title' => 'Beranda',
            'isi' => $this->UserModel->findAll(),
            'produk' => $this->ProdukModel->findAll(),
            'produk_terbaru' => $this->ProdukModel->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')->orderBy('tb_produk.created_at', 'DESC')->limit(3)->findAll(),
            'pages' => "home"
        ];
        return view('frontend/index', $data);
    }
}
