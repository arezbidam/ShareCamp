<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;
use App\Models\KeranjangModel;

class Products extends BaseController
{
  public function __construct()
  {
    $this->UserModel = new UserModel();;
    $this->CategoriesModel = new CategoriesModel();
    $this->KeranjangModel = new KeranjangModel();
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

  public function detail($id_barang)
  {

    $data = [
      'title' => 'Detail Produk',
      'filter_title' => null,
      'data_user' => $this->UserModel->where('id_user', session()->get('id'))->first(),
      'categories' => $this->CategoriesModel->findAll(),
      'barang' => $this->BarangModel->get_barang_by_id_barang($id_barang),
    ];
    return view('pages/detail_products', $data);
  }

  public function add_keranjang()
  {
    $id_user = session()->get('id');
    $id_barang = $this->request->getVar('id_barang');
    $barang = $this->BarangModel->get_barang_by_id_barang($id_barang);
    $addKeranjang = $this->KeranjangModel->insert([
      'id_user' => $id_user,
      'id_toko' => $barang['id_toko'],
      'id_barang' => $barang['id_barang'],
    ]);
    if ($addKeranjang) {
      session()->setFlashdata('pesan', 'Berhasil Di Simpan');
    } else {
      session()->setFlashdata('pesan', 'Gagal Di Simpan');
    }
    return redirect()->to('/products');
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
