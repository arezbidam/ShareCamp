<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Products extends BaseController
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
      'title' => 'Produk',
      'filter_title' => null,
      'data_user' => $this->UserModel->where('id_user', session()->get('id'))->first(),
      'categories' => $this->CategoriesModel->findAll(),
      'barang' => $this->BarangModel->orderBy('harga', 'DESC')->findAll(),
      // 'barang_detail' => $this->BarangModel->get_barang_detail(),
    ];
    // dd($data['filter_city']);
    return view('pages/products', $data);
  }

  public function filter_city()
  {
    $filters = [
      'city' => $this->request->getVar('city_check'),
    ];

    $data = [
      'title' => 'Produk',
      'filter_title' => '<span> Menampilkan daftar produk dari ' . '<span class="fw-bold" >' . $filters['city'] . ' </span> </span>',
      'barang' => $this->BarangModel->get_barang_by_city($filters['city']),
      'data_user' => $this->UserModel->where('id_user', session()->get('id'))->first(),
    ];
    return view('pages/products', $data);
  }

  public function filter_asc()
  {
    if ($this->request->getVar('asc_check') == true) {
      $data = [
        'title' => 'Produk',
        'filter_title' => '<span> Menampilkan daftar berdasarkan harga ' . '<span class="fw-bold" > Termurah </span> </span>',
        'barang' => $this->BarangModel->get_barang_by_filter_asc(),
        'data_user' => $this->UserModel->where('id_user', session()->get('id'))->first(),
      ];
      return view('pages/products', $data);
    }
  }
}
